<?php
namespace App\Http\Controllers;

    use App\Models\{
        User,
        //para borrar por client
        historial_curso_client,
        asistencia_curso,
        Payments,
        dias_curso_cliente,
        Order,
        Cursos,
        //para borrar por user_id
        Clientes
    };
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Illuminate\Support\Facades\DB;
    use App\Http\Traits\HelpersTrait;
    use Illuminate\Support\Facades\Http;
    use Exception;

    use App\Imports\GolInUserImport;
    use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    use HelpersTrait;
    public function import_gol(Request $request){
        $file=$request->file('excel');
        Excel::import(new GolInUserImport, $file);
        return ['message'=>'existoso'];
    }//end
    public function getRecovery(Request $request){
        try {
            $email=$request->input('email') ?? null;
            if(!$email){
                return ["message"=>"Correo no enviado","status"=>404];
            }
            $user=User::where('email',$email)->first();
            if(!$user){
                return ["message"=>"Usuario no encontrado","status"=>404];
            }
            $user->recovery_cod=rand(10000,10000000);
            $user->save();
            $envio=$this->sendMail($user->email,30547075,[
                "codigo" => $user->recovery_cod,
            ]);
            return [
                'message'=>"Correo enviado ah ".$email
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function validateRecovery(Request $request){
        try {
            $email=$request->input('email') ?? null;
            $code=$request->input('code') ?? null;
            if(!$email){
                return response()->json(["message"=>"Correo no enviado","status"=>404],404);
            }
            if(!$code){
                return response()->json(["message"=>"Codigo no enviado","status"=>404],404);
            }
            $user=User::where('email',$email)->where('recovery_cod',$code)->first();
            if(!$user){
                return response()->json(["message"=>"Usuario no encontrado","status"=>404],404);
            }
            return [
                'message'=>"Usuario y codigo validos",
                'status'=>200
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function putRecovery(Request $request){
        try {
            $recovery_cod=$request->input('recovery_cod') ?? null;
            if(!$recovery_cod){
                throw new Exception("Codigo no enviado", 404);
            }
            $password=$request->input('password') ?? null;
            if(!$password){
                throw new Exception("Contraseña no enviado", 404);
            }
            $email=$request->input('email') ?? null;
            if(!$email){
                throw new Exception("Correo no enviado", 404);
            }
            $user=User::where('email',$email)->where('recovery_cod',$recovery_cod)->first();
            if(!$user){
                throw new Exception("Usuario no encontrado", 404);
            }
            $user->password=bcrypt($password);
            $user->recovery_cod="";
            $user->save();
            return [
                "message"=>"Usuario Actualizado con exito"
            ];
        } catch (\Exception $error) {
            return response()->json([
                "file"=>$error->getFile(),
                "message"=>$error->getMessage(),
                "error"=>$error->getMessage(),
                "line"=>$error->getLine()
            ],404);
        }
    }
    public function index(Request $request){
        $query=User::query();
        $rol=$request->input('rol') ?? null;
        $name=$request->input('name') ?? null;
        $active=$request->input('active') ?? null;
        if($rol){
            $query->where('role_id',$rol);
        }
        if($name){
            $query
            ->where('name','like','%'.$name.'%')
            ->orWhere('email',$name);

        }
        if($active){
            $query->where('active',$active);
        }
        return $this->HelpPaginate(
                $query
            );
    }
    public function update($id,Request $request){
        try {

            DB::beginTransaction();
                $data=$request->all();
                $user=User::find($id);
                if(!$user){
                    return response()->json(['error'=>'usuario no encontrado'], 400);
                }
                if($user->active==0 && $data['active']==1){
                    $realtime = Http::post('https://pocketbase.real.phoenixtechsa.com/api/collections/activacion_de_usuario_initium/records', [
                        'user_id' => $user->id
                    ]);
                }
                if( isset($data['password']) ){
                    $data["password"]=bcrypt($data["password"]);
                }
                
                if ($request->hasFile('img')) {
                    $file = $request->file('img');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/', $name);
                    $data['img'] = $name;
                }
                $user->update($data);
            DB::commit();
            return response()->json([
                "data"=>$user
            ],200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function show($id,Request $request){
        return $this->HelpShow(
            User::where("id",$id)->limit(1)->with([]),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        try {

            DB::beginTransaction();
               $user=User::find($id);
               if(!$user){
                throw new \Exception("Usuario no encontrado", 404);
               }
               $client=Clientes::where("user_id",$user->id)->first();
               if($client){
                    dias_curso_cliente::where('client_id',$client->id)->delete();
                    Payments::where("client_id",$client->id)->delete();
                    historial_curso_client::where("client_id",$client->id)->delete();
                    asistencia_curso::where("client_id",$client->id)->delete();
                    Order::where("client_id",$client->id)->delete();
                    $client->delete();
               }
               User::where('id',$id)->limit(1)->delete();

            DB::commit();
            return response()->json([
                "data"=>$user
            ],200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo iniciar'], 500);
        }
        $user=User::where('email',$request->input('email'))->limit(2)->first();
        if($user->role_id!=1){
            return response()->json(['error' => 'No se pudo iniciar, el usuario no es admin'], 500);
        }
        if($user->active==0){
            return response()->json([
               'user'=>$user,
               'error'=>"El usuario no esta autorizado"
            ],500);
        }
        return response()->json(compact('token','user'));
    }
    public function authenticate_participante(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo iniciar'], 500);
        }
        $user = User::where('email', $request->input('email'))->limit(2)->first();
        return response()->json(compact('token', 'user'));
    }
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }
    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:2',
                ]);
                if($validator->fails()){
                    return response()->json($validator->errors()->toJson(), 400);
                }
                $data=$request->all();
                $data["password"]=bcrypt($data["password"] ?? "12345");

                if ($request->hasFile('img')) {
                    $file = $request->file('img');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/', $name);
                    $data['img'] = $name;
                }
                $user = User::create($data);
                $token = JWTAuth::fromUser($user);
            DB::commit();
                return response()->json(compact('user','token'),201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }

    }//Registro
    public function inscribir(Request $request){
        try{
            DB::beginTransaction();
            
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:2',
                ]);
                if($validator->fails()){
                    return response()->json(
                        json_decode(
                            $validator->errors()->toJson()
                        ), 400);
                }
                $data=$request->except(['price','nombre_paquete']) ?? [];
                // $sic='SIC';
                // $last_curso=Cursos::query()
                //     ->orderBy('id','desc')
                //     ->where('name',"LIKE","%".$sic."%")
                // ->first();
                $data["password"] = bcrypt($data["password"]);
                // $data["curso_actual_id"]=$last_curso->id;
                $data['form_resolve']=0;
                if ($request->hasFile('img')) {
                    $file = $request->file('img');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/', $name);
                    $data['img'] = $name;
                }
                $user = User::create($data);
                $token = JWTAuth::fromUser($user);
                //crear client por defecto
                $client=Clientes::create([
                    'name'=>$data['name'],
                    'last_name'=>'',
                    'phone'=>'',
                    'email'=>$data['email'],
                    'birth_date'=>'',
                    'nacionalidad'=>'',
                    'civil_status'=>'',
                    'pais'=>'',
                    'accept_contract'=>'',
                    "occupation"=>'',
                    "objectives"=>'',
                    "dni"=>'',
                    "Nickname"=>'',
                    "place_work"=>'',
                    "referrals_code"=>'',
                    "question_1"=>'',
                    "question_2"=>'',
                    "note_1"=>'',
                    "note_2"=>'',
                    "sexo"=>'',
                    "reference_person"=>'',
                    "user_id"=>$user->id
                ]);
                //crear la orden
                $order=[
                    "user_id"=>$user->id,
                    "price"=>$data['product']['precio'] ?? 0,
                    "payment_method"=>$data['paymentMethod'],
                    'client_id'=>$client->id
                ];
                if($request->hasFile('capture.__key')) {
                    $file = $request->file('img');
                    $name = time() . $file->getClientOriginalName();
                    $file->move(public_path() . '/images/pagos/', $name);
                    $order['img_url'] = $name;
                }
                
                Order::create($order);
                /*
                $order=Order::create([
                    "reason"=>($request->input('nombre_paquete') ?? 'Paquete por defecto'),
                    "user_id"=>$user->id,
                    "price"=>$request->input('price') ?? 0,
                    "pay"=>0,
                    "payment_method"=>'Stripe',
                    "curso_id"=>$last_curso->id,
                    "pending"=>$request->input('price') ?? 0,
                    "gol"=>''
                ]);
                */
            DB::commit();
                return response()->json(compact('user','token'),201);
        }catch(\Exception $e){
            DB::rollback();
            return $this->Error($e);
        }
    }//end Function

}//End Class

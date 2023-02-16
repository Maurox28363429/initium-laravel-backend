<?php   
namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Illuminate\Support\Facades\DB;
    use App\Http\Traits\HelpersTrait;
class UserController extends Controller
{
    use HelpersTrait;
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
            $user=User::where('recovery_cod',$recovery_cod)->first();
            if(!$user){
                throw new Exception("Usuario no encontrado", 404);
            }
            $user->password=bcrypt($password);
            $user->recovery_cod="";
            $user->save();
            return [
                "message"=>"Usuario Actualizado con exito"
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
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
            $query->where('name','like','%'.$name.'%');
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
                if( isset($data['password']) ){
                    $data["password"]=bcrypt($data["password"]);
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
        return $this->HelpDelete(
            User::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user=User::where('email',$request->input('email'))->limit(2)->first();
        return response()->json(compact('token','user'));
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
                $data=$request->except(["active"]);
                $data["password"]=bcrypt($data["password"] ?? "12345");
                $user = User::create($data);
                $token = JWTAuth::fromUser($user);
            DB::commit();
                return response()->json(compact('user','token'),201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }

    }//Registro

}//End Class
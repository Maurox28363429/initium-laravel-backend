<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    departamentos,
    Edificios
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
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    use HelpersTrait;
    public function adminMisEdificios(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                throw new \Exception("Usuario no encontrado", 404);
            }
            $edificios = Edificios::where('user_id', $user->id)->get();
            DB::commit();
            return response()->json([
                "edificios" => $edificios
            ], 200);
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function misDepartamentos(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                throw new \Exception("Usuario no encontrado", 404);
            }
            $edifio_id = $request->input('edificio_id') ?? null;
            if (!$edifio_id) {
                throw new \Exception("Edificio no enviado", 404);
            }
            $departamentos = departamentos::where('edificio_id', $edifio_id)
                ->orWhere('propietario_principal_id', $user->id)
                ->orWhere('propietario_secundario_id', $user->id)
                ->orWhere('inquilino_id', $user->id)
            ->get();
            DB::commit();
            return response()->json([
                "departamentos" => $departamentos
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function misEdificios(Request $request)
    {
        try {
            /*
            "edificio_id",
            "nombre",
            "status",
            "propietario_principal_id",
            "propietario_secundario_id",
            "inquilino_id"
            */
            DB::beginTransaction();
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                throw new \Exception("Usuario no encontrado", 404);
            }
            $departamentos = departamentos::where('propietario_principal_id', $user->id)
                ->orWhere('propietario_secundario_id', $user->id)
                ->orWhere('inquilino_id', $user->id)
                ->groupBy('edificio_id')
                ->get();
            $edificios=Edificios::whereIn('id',$departamentos->pluck('edificio_id'))->get();
            DB::commit();
            return response()->json([
                "edificios" => $edificios
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function refreshtoken(Request $request)
    {
        try {
            $token = JWTAuth::getToken();
            $token = JWTAuth::refresh($token);
            $user = JWTAuth::setToken($token)->toUser();
            return response()->json(compact('token', 'user'));
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function getRecovery(Request $request)
    {
        try {
            $email = $request->input('email') ?? null;
            if (!$email) {
                return ["message" => "Correo no enviado", "status" => 404];
            }
            $user = User::where('email', $email)->first();
            if (!$user) {
                return ["message" => "Usuario no encontrado", "status" => 404];
            }
            $user->recovery_cod = rand(10000, 10000000);
            $user->save();
            $envio = $this->sendMail($user->email, 30547075, [
                "codigo" => $user->recovery_cod,
            ]);
            return [
                'message' => "Correo enviado ah " . $email
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function validateRecovery(Request $request)
    {
        try {
            $email = $request->input('email') ?? null;
            $code = $request->input('code') ?? null;
            if (!$email) {
                return response()->json(["message" => "Correo no enviado", "status" => 404], 404);
            }
            if (!$code) {
                return response()->json(["message" => "Codigo no enviado", "status" => 404], 404);
            }
            $user = User::where('email', $email)->where('recovery_cod', $code)->first();
            if (!$user) {
                return response()->json(["message" => "Usuario no encontrado", "status" => 404], 404);
            }
            return [
                'message' => "Usuario y codigo validos",
                'status' => 200
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }
    public function putRecovery(Request $request)
    {
        try {
            $recovery_cod = $request->input('recovery_cod') ?? null;
            if (!$recovery_cod) {
                throw new Exception("Codigo no enviado", 404);
            }
            $password = $request->input('password') ?? null;
            if (!$password) {
                throw new Exception("Contraseña no enviado", 404);
            }
            $email = $request->input('email') ?? null;
            if (!$email) {
                throw new Exception("Correo no enviado", 404);
            }
            $user = User::where('email', $email)->where('recovery_cod', $recovery_cod)->first();
            if (!$user) {
                throw new Exception("Usuario no encontrado", 404);
            }
            $user->password = bcrypt($password);
            $user->recovery_cod = "";
            $user->save();
            return [
                "message" => "Usuario Actualizado con exito"
            ];
        } catch (\Exception $error) {
            return response()->json([
                "file" => $error->getFile(),
                "message" => $error->getMessage(),
                "error" => $error->getMessage(),
                "line" => $error->getLine()
            ], 404);
        }
    }
    public function index(Request $request)
    {
        $query = User::query();
        $rol = $request->input('rol') ?? null;
        $name = $request->input('search') ?? null;
        $active = $request->input('active') ?? null;
        $selected = $request->input('selected') ?? null;
        $edificio_id = $request->input('edificio_id') ?? null;
        if ($rol) {
            $query->where('role_id', $rol);
        }
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if ($active) {
            $query->where('active', $active);
        }
        if ($edificio_id) {
            $edificio = Edificios::find($edificio_id);
            if (!$edificio) {
                throw new \Exception("Edificio no encontrado", 404);
            }
            $departamentos_users_id = departamentos::where('edificio_id', $edificio_id)
                ->pluck('propietario_principal_id')
                ->merge(departamentos::where('edificio_id', $edificio_id)
                    ->pluck('propietario_secundario_id'))
                ->merge(departamentos::where('edificio_id', $edificio_id)
                    ->pluck('inquilino_id'));
            $query->whereIn('id', $departamentos_users_id);
        }
        if ($selected) {
            $query->select([
                'id', 'name'
            ]);
            return $query->get();
        }
        return $this->HelpPaginate(
            $query
        );
    }
    public function masiveAsignacion(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $users = User::whereIn('id', $data['users'])->get();
            $departamento = departamentos::find($data['departamento_id']);
            if (!$departamento) {
                throw new \Exception("Departamento no encontrado", 404);
            }
            if ($departamento->status == "Ocupado") {
                throw new \Exception("Departamento ya esta ocupado", 404);
            }
            if (!$departamento) {
                throw new \Exception("Departamento no encontrado", 404);
            }
            foreach ($users as $user) {
                propietarios::create([
                    'user_id' => $user->id,
                    'departamento_id' => $departamento->id
                ]);
            }
            departamentos::where('id', $data['departamento_id'])->update([
                'status' => "Ocupado"
            ]);
            DB::commit();
            return response()->json([
                "data" => $users
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function update($id, Request $request)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();
            $user = User::find($id);
            if (!$user) {
                return response()->json(['error' => 'usuario no encontrado'], 400);
            }
            if (isset($data['password'])) {
                $data["password"] = bcrypt($data["password"]);
            }

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
                $data['img'] = $name;
            }
            if ($request->hasFile('contrato')) {
                $file = $request->file('contrato');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/contratos', $name);
                $data['contrato'] = $name;
            }
            $user->update($data);
            DB::commit();
            return response()->json([
                "data" => $user
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function show($id, Request $request)
    {
        return $this->HelpShow(
            User::where("id", $id)->limit(1)->with([]),
            $request->all()
        );
    }
    public function delete($id, Request $request)
    {
        try {

            DB::beginTransaction();
            $user = User::find($id);
            if (!$user) {
                throw new \Exception("Usuario no encontrado", 404);
            }
            User::where('id', $id)->limit(1)->delete();

            DB::commit();
            return response()->json([
                "data" => $user
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo iniciar'], 500);
        }
        $user = User::where('email', $request->input('email'))->limit(1)->first();

        return response()->json(compact('token', 'user'));
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
            if ($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }
            $data = $request->all();
            $data["password"] = bcrypt($data["password"] ?? "12345");

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/', $name);
                $data['img'] = $name;
            }
            if ($request->hasFile('contrato')) {
                $file = $request->file('contrato');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/contratos', $name);
                $data['contrato'] = $name;
            }
            $user = User::create($data);
            $token = JWTAuth::fromUser($user);
            DB::commit();
            return response()->json(compact('user', 'token'), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //Registro
}//End Class

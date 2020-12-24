<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['authenticate', 'index']]);
    }

    public function index(Request $request)
    {
        session_start();
        if ($_SESSION['role'] == "Admin") {
            return view('users.index');
        } else {
            return redirect()->route('clients');
        }
    }

    public function all()
    {
        $users = User::with('roles')->get();
        foreach ($users as $key => $user) {
            foreach ($user->getRoleNames() as $role) {
                $user->role = $role;
            }
        }
        return response()->json($users, 200);
    }

    public function getById($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function getByName(Request $request)
    {
        if($request->name == ""){
            return $this->all();
        }else{
            $user = User::where('name', $request->name)->get();
            return response()->json($user, 200);
        }
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return response()->json(['message' => 'Usuario eliminado!'], 200);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'type'      => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ];

        DB::table('users')->where('id', $id)->update($data);

        return response()->json(['message' => "Usuario actualizado!"], 201);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales incorrectas'], 400);
            }
            session_start();
            $_SESSION['role'] = auth()->user()->roles[0]->name;
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }
        return response()->json(['token' => compact('token'), 'user' => auth()->user()->name]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return view('welcome');
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['No se encuentra el usuario'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['Token expirado'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['Token invalido'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['El Token no existe'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6',
            'type'      => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->assignRole($request->get('type'));

        return response()->json(['message' => "Usuario agregado!"], 201);
    }
}

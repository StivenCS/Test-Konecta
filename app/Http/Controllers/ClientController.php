<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['index']]);
    }

    public function index()
    {
        return view('clients.index');
    }

    public function all()
    {
        $clients =DB::table('clients')->get();
        return response()->json($clients, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'document'      => 'required|numeric',
            'direction'      => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'document' => $request->get('document'),
            'direction' => $request->get('direction'),
        ];

        DB::table('clients')->insert($data);

        return response()->json(['message' => "Cliente agregado!"], 201);
    }


    public function getById($id)
    {
        $clients = DB::table('clients')->where('id',$id)->get();
        return response()->json($clients, 200);
    }

    public function destroy($id){
        DB::table('clients')->where('id',$id)->delete();
        return response()->json(['message'=>'Cliente eliminado!'], 200);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'document'      => 'required|numeric',
            'direction'      => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'document' => $request->get('document'),
            'direction' => $request->get('direction'),
        ];

        DB::table('clients')->where('id',$id)->update($data);

        return response()->json(['message' => "Cliente actualizado!"], 201);
    }
}

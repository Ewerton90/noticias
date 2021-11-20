<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct(){
			$this->middleware("auth");
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = new User();
		$usuarios = User::All();
		return view("usuarios.index", [
			"usuario" => $usuario,
			"usuarios" => $usuarios
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get("id") != ""){
			$usuario = User::Find($request->get("id"));
		}else{
			$usuario = new User(); 
		}
		$usuario->name = $request->get("nome");
		$usuario->email = $request->get("email");
		$usuario->password = Hash::make ($request->get("password"));
		$usuario->Save();
		$request->Session()->Flash("status", "salvo");
		return redirect("/usuarios");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::Find($id);
		$usuarios = User::All();
		return view("usuarios.index", [
			"usuario" => $usuario,
			"usuarios" => $usuarios
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Usuario::Destroy($id);
		$request->Session()->Flash("status", "excluido");
		return redirect("/usuarios");
    }
}

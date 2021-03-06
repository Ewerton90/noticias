<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Noticia;

class NoticiaController extends Controller
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
		$noticia = new Noticia();
		$noticias = Noticia::All();
        return view("noticias.index", [
			"noticia" => $noticia,
			"noticias" => $noticias
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
        if ($request->get("id") != ""){
			$noticia = Noticia::Find($request->get("id"));
		}else{
			$noticia = new Noticia();
		}
		$noticia->titulo = $request->get("titulo");
		$noticia->subtitulo = $request->get("subtitulo");
		$noticia->texto = $request->get("texto");
		$noticia->usuario = Auth::id();
		$noticia->save();
		$request->session()->flash("status", "salvo com sucesso");
		return redirect("/noticias");		
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
        $noticia = Noticia::Find($id);
		$noticias = Noticia::All();
        return view("noticias.index", [
			"noticia" => $noticia,
			"noticias" => $noticias
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
        Noticia::Destroy($id);
		$request->session()->flash("status", "excluido com sucesso");
		return Redirect("/noticias");
    }
}

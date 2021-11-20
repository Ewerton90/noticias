<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Imagem;

class NoticiaPublicController extends Controller
{
    public function index()
	{
		$noticias = Noticia::limit(1)->get();
		return view("index", [
			"noticias" => $noticias
		]);
	}
}

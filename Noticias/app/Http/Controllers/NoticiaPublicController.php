<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Imagem;
use Illuminate\Support\Facades\DB;

class NoticiaPublicController extends Controller
{
    public function index()
	{
		$noticias = Noticia::paginate(2);
		return view("index", [
			"noticias" => $noticias
		]);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imagem;

class Noticia extends Model
{
    use HasFactory;
	
	protected $table = "Noticia";
	
	public function imagens(){
		return $this->hasMany(Imagem::Class, "noticia", "id");
	}
}

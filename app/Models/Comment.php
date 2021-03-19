<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $table = "comentario";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'id_usuario', 'id_publicacao', 'data'];

    public function usuario(){
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function getCommentsByPublication($idPublication){
        return Comment::with("usuario")
        ->where("id_publicacao", $idPublication)
        ->orderBy('data')
        ->get();
    }
}

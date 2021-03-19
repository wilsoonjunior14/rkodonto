<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Like extends Model
{
    protected $table = "curtidas";
    protected $fillable = ['id', 'id_publicacao', 'id_usuario', 'data', 'ativo'];
    public $timestamps = false;

    public function Usuario(){
        return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function getLikesByPublication($idPublication){
        return Like::with("Usuario")
        ->where("id_publicacao", $idPublication)
        ->where('ativo', true)
        ->orderBy('data')
        ->get();
    }

    public function verifiesIfPublicationWasLikedByUser($idUser, $idPublication){
        $likes = $this->getLikesByUserAndPublication($idUser, $idPublication);
        return count($likes) > 0;
    }

    public function getLikesByUserAndPublication($idUser, $idPublication){
        $likes = Like::where('id_usuario', $idUser)
        ->where('id_publicacao', $idPublication)
        ->where('ativo', true)
        ->get();

        return $likes;
    }
}

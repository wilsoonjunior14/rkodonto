<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = "enquete";
    public $timestamps = false;
    protected $fillable = ['id', 'pergunta', 'data_inicio', 'data_fim', 'excluido'];

    public function respostas(){
        return $this->hasMany('App\Models\Questions', 'id_enquete', 'id')
        ->where("excluido", false);
    }

    public function getSurveysAvailableForUser($idUser){
        $today = date('Y-m-d');

        return Survey::with("respostas.opiniao")
        ->where("excluido", false)
        ->where("data_inicio", "<=", $today)
        ->where("data_fim", ">=", $today)
        ->whereDoesntHave("respostas.opiniao", function($query) use ($idUser){
            $query->where('id_usuario', $idUser);
        })
        ->get();
    }
}

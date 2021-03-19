<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeScheduling;

class Scheduling extends Model
{
    protected $table = "agendamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'data', 'id_tipo_agendamento', 'id_usuario'];

    public function tipo_agendamento(){
        return $this->hasOne('App\Models\TypeScheduling', 'id', 'id_tipo_agendamento');
    }

    public function getSchedulingByUser($idUser){
        return Scheduling::with("tipo_agendamento")
        ->where("id_usuario", $idUser)
        ->orderBy("data")
        ->get();
    }
}

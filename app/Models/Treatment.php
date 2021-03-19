<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeTreatment;
use App\Models\StatusTreatment;

class Treatment extends Model
{
    protected $table = "tratamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'observacao', 'data_criacao', 'data_inicio', 'data_fim', 'id_usuario', 'id_tipo_tratamento', 'id_status_tratamento', 'deletado'];

    public function tipo_tratamento(){
        return $this->hasOne('App\Models\TypeTreatment', 'id', 'id_tipo_tratamento');
    }

    public function status_tratamento(){
        return $this->hasOne('App\Models\StatusTreatment', 'id', 'id_status_tratamento');
    }

    public function recomendacoes(){
        return $this->hasMany('App\Models\TreatmentRecomendation', 'id_tratamento', 'id');
    }

    public function medicamento(){
        return $this->hasMany('App\Models\Medicine', 'id_tratamento', 'id');
    }

    public function previsao(){
        return $this->hasMany('App\Models\Forecast', 'id_tratamento', 'id');
    }

    public function getTreatmentsByUser($idUser){
        return $this::with("tipo_tratamento")
        ->with("status_tratamento")
        ->with('recomendacoes.recomendacao')
        ->with('medicamento')
        ->with('previsao')
        ->where("deletado", false)
        ->where("id_usuario", $idUser)
        ->get();
    }

}

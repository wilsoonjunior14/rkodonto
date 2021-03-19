<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentRecomendation extends Model
{
    protected $table = "mensagem";
    public $timestamps = false;
    protected $fillable = ['id', 'id_tratamento', 'id_recomendacao'];

    public function recomendacao(){
        return $this->hasOne('App\Models\Recomendation', 'id', 'id_recomendacao');
    }

}

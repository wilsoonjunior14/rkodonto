<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = "orcamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'id_usuario', 'data_inicio', 'data_cadastro', 'ativo'];

    public function orcamento_itens(){
        return $this->hasMany('App\Models\BudgetItems', 'id_orcamento', 'id');
    }

    public function pagamentos(){
        return $this->hasMany('App\Models\Payment', 'id_orcamento', 'id');
    }

    function getBudgetsByUser($idUser){
        return $this::with('orcamento_itens')
        ->with('pagamentos')
        ->where('id_usuario', $idUser)
        ->orderBy('data_inicio')
        ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItems extends Model
{
    protected $table = "orcamento_itens";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'quantidade', 'valor_unitario', 'id_orcamento'];
}

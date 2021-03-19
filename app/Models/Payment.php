<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "pagamentos";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'quantidade', 'valor_unitario', 'id_orcamento'];
}

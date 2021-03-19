<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = "medicamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'horario', 'observacao', 'id_tratamento'];
}

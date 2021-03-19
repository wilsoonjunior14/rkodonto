<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    protected $table = "avaliacao";
    public $timestamps = false;
    protected $fillable = ['id', 'avaliacao', 'descricao', 'id_usuario', 'data'];
}

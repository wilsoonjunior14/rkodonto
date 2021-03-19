<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = "opiniao";
    public $timestamps = false;
    protected $fillable = ['id', 'id_usuario', 'id_resposta', 'data'];
}

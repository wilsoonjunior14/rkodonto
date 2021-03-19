<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeScheduling extends Model
{
    protected $table = "tipo_agendamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao', 'cor'];    
}

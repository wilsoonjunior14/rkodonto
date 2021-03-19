<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = "previsao";
    public $timestamps = false;
    protected $fillable = ['id', 'data', 'id_tratamento', 'id_status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTreatment extends Model
{
    protected $table = "status_tratamento";
    public $timestamps = false;
    protected $fillable = ['id', 'id', 'descricao', 'color'];
}

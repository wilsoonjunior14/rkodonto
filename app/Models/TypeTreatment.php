<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTreatment extends Model
{
    protected $table = "tipo_tratamento";
    public $timestamps = false;
    protected $fillable = ['id', 'descricao'];
}

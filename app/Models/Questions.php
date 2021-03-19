<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = "resposta";
    public $timestamps = false;
    protected $fillable = ['id', 'resposta', 'id_enquete', 'excluido'];

    public function opiniao(){
        return $this->hasMany('App\Models\Answers', 'id_resposta', 'id');
    }
}

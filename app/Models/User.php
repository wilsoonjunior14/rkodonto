<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $table = "usuario";
    public $timestamps = false;

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nome',
        'email',
        'senha',
        'data_nascimento',
        'cpf',
        'telefone',
        'ativo',
        'id_permissao',
        'foto'
    ];

    public function existsUserByEmail($email){
        $users = User::where("email", "like", "%{$email}%")
        ->get();

        return $users;
    }

    public function getUserByEmail($email){
        return User::where("email", "like", "%{$email}%")
        ->where("ativo", true)
        ->get();
    }
}

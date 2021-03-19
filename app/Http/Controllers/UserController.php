<?php

namespace App\Http\Controllers;

use Request;
use App\Validations\UserValidation;
use App\Models\User;
use App\Utils\Utils;

class UserController extends Controller
{
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function login(){
        $data = Request::all();

        UserValidation::validatePreLoginUser($data);
        $users = $this->userModel->getUserByEmail($data['email']);
        UserValidation::validatePostLoginUser($users, $data['senha']);

        $user = $users[0];

        return response()->json(['status' => true, 'mensagem' => 'Login realizado com sucesso!', 'data' => $user]);
    }

    public function add(){
        $data = Request::all();

        UserValidation::validateUserRegister($data);

        $user = new User($data);

        if (count($this->userModel->existsUserByEmail($user->email)) <= 0){
            $user->save();
        }else{
            $user = $this->userModel->getUserByEmail($user->email)[0];
        }

        return response()->json(['status' => true, 'mensagem' => 'Usuário recuperado com sucesso', 'data' => $user]);
    }

    public function changePassword(){
        $data = Request::all();

        UserValidation::validateChangePassword($data);

        $user = User::find($data['id']);
        $user->senha = $data['senha'];
        $user->save();

        return response()->json([
            'status' => true,
            'mensagem' => 'Senha alterada com sucesso!'
        ]);
    }

    public function recoveryPassword(){
        $data = Request::all();

        $exists = count($this->userModel->existsUserByEmail($data['email'])) > 0;
        if (!$exists){
            return response()->json([
                'status' => false,
                'mensagem' => 'Email não registrado em nosso sistema.'
            ]);
        }

        $user = $this->userModel->getUserByEmail($data['email'])[0];
        $user->senha = Utils::generateRandomString(6);

        Utils::sendBasicEmail();

        return response()->json([
            'status' => true,
            'mensagem' => 'Uma senha temporária foi enviada para seu email.',
            'data' => $user
        ]);

    }
}

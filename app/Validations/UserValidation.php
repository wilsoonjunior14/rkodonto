<?php

namespace App\Validations;

class UserValidation {

    public static function validatePreLoginUser($data){
        if (!isset($data['email']) || !isset($data['senha'])){
            return response()->json(['status' => false, 'mensagem' => 'Email ou Senha não informados.']);
        }

        if (empty($data['email']) || empty($data['senha'])){
            return response()->json(['status' => false, 'mensagem' => 'Email ou Senha inválidos.']);
        }
    }

    public static function validatePostLoginUser($users, $passwordInformed){
        if (empty($users)){
            return response()->json(['status' => false, 'mensagem' => 'Usuário não identificado.']);
        }

        $user = $users[0];

        if (!$user->ativo){
            return response()->json(['status' => false, 'mensagem' => 'Usuário sem permissão de acesso a plataforma.']);
        }

        if (strcmp($passwordInformed, $user->senha) !== 0){
            return response()->json(['status' => false, 'mensagem' => 'Senha informada está incorreta.']);
        }
    }

    public static function validateUserRegister($data){
        if (!isset($data['email']) || empty($data['email'])){
            return response()->json(['status' => false, 'mensagem' => 'Email de usuário inválido.']);
        }

        if (!isset($data['nome']) || empty($data['nome'])){
            return response()->json(['status' => false, 'mensagem' => 'Nome de usuário inválido.']);
        }
    }

    public static function validateChangePassword($data){
        if (strcmp($data['senha'], $data['confsenha']) !== 0){
            return response()->json([
                'status' => false,
                'mensagem' => 'Senhas informadas estão distintas.'
            ]);
        }
    }
}



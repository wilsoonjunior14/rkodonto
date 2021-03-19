<?php 

namespace App\Validations;

class PublicationValidation {

	public static function validateSearchPublications($data){
		if (!isset($data['pg']) || !isset($data['id_usuario'])){
			return response()->json([
				'status' => false,
				'mensagem' => 'Página de busca ou usuário não informado.'
			]);
		}
	}

	public static function validateLikePublication($data){
		if (!isset($data['id_usuario']) || empty($data['id_usuario'])){
			return response()->json([
				'status' => false,
				'mensagem' => 'Identificador do usuário não informado.'
			]);
		}

		if (!isset($data['id_publicacao']) || empty($data['id_publicacao'])){
			return response()->json([
				'status' => false,
				'mensagem' => 'Identificador da publicação não informado.'
			]);
		}
	}

	public static function validateAddComment($data){
		PublicationValidation::validateLikePublication($data);

		if (!isset($data['descricao']) || empty($data['descricao'])){
			return response()->json([
				'status' => false,
				'mensagem' => 'Comentário inválido.'
			]);
		}

		if (strlen($data['descricao']) > 255){
			return response()->json([
				'status' => false,
				'mensagem' => 'Comentário muito extenso! Um máximo de 255 caracteres são permitidos.'
			]);
		}
	}

}
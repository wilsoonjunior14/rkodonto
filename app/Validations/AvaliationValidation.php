<?php 

namespace App\Validations;

class AvaliationValidation {

	public static function validateAddAvaliation($data){

		if (!isset($data['avaliation']) || empty($data['avaliation']) ){
			return response()->json([
				'status' => false,
				'mensagem' => 'Avaliação não informada!'
			]);
		}

		if (!isset($data['descricao']) || empty($data['descricao']) || strlen($data['descricao']) > 255){
			return response()->json([
				'status' => false,
				'mensagem' => 'Descrição de avaliação inválida! Máximo de 255 caracteres são permitidos.'
			]);
		}
		
	}


}
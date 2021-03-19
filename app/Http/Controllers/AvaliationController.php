<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Avaliation;
use App\Validations\AvaliationValidation;

class AvaliationController extends Controller
{

    private $avaliationModel;
    
    public function __construct(){
        $this->avaliationModel = new Avaliation();
    }

    public function add(){
        $data = Request::all();
        if ($data['id_usuario'] === 0){
            unset($data['id_usuario']);
        }

        $avaliation = new Avaliation($data);
        $avaliation->data = date('Y-m-d');
        $avaliation->save();

        return response()->json([
            'status' => true,
            'mensagem' => 'Avaliação salva com sucesso! Obrigado por nos contactar.'
        ]);
    }

}

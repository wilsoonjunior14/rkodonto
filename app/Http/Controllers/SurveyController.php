<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Survey;
use App\Models\Answers;
use App\Models\Questions;

class SurveyController extends Controller
{
    private $surveyModel;
    private $answersModel;

    public function __construct(){
        $this->surveyModel = new Survey();
        $this->answersModel = new Answers();
    }

    public function get(){
        $data = Request::all();

        $surveys = $this->surveyModel->getSurveysAvailableForUser($data['id_usuario']);

        return response()->json([
            'status' => true,
            'mensagem' => 'Enquetes encontradas com sucesso.',
            'data' => $surveys
        ]);
    }

    public function addAnswerByUser(){
        $data = Request::all();

        $answer = new Answers($data);
        $answer->data = date('Y-m-d');
        $answer->save();

        return response()->json([
            'status' => true,
            'mensagem' => 'Enquete respondida com sucesso! Obrigado por responder.'
        ]);
    }
}

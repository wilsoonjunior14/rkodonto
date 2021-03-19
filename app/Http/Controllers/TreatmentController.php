<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    private $treatmentModel;

    public function __construct(){
        $this->treatmentModel = new Treatment();
    }

    public function getTreatmentsByUser(){
        $data = Request::all();

        $treatments = $this->treatmentModel->getTreatmentsByUser($data['id']);

        return response()->json([
            'status' => true,
            'mensagem' => '',
            'data' => $treatments
        ]);
    }
}

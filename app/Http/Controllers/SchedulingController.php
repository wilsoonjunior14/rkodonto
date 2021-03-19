<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Scheduling;

class SchedulingController extends Controller
{
    private $schedulingModel;

    public function __construct(){
        $this->schedulingModel = new Scheduling();
    }

    public function getSchedulingByUser(){
        $data = Request::all();

        $schedulings = $this->schedulingModel->getSchedulingByUser($data['id']);

        return response()->json([
            'status' => true,
            'mensagem' => '',
            'data' => $schedulings
        ]);
    }
}

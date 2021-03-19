<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    private $budgetModel;

    public function __construct(){
        $this->budgetModel = new Budget();
    }

    public function getBudgetsByUser(){
        $data = Request::all();

        $budgets = $this->budgetModel->getBudgetsByUser($data['id']);

        return response()->json([
            'status' => true,
            'mensagem' => '',
            'data' => $budgets
        ]);
    }
}

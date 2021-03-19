<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\BudgetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function(){

    /* Routes for users */
    Route::post('usuario/autenticar', [UserController::class, 'login']);
    Route::post('usuario/adicionar', [UserController::class, 'add']);
    Route::post('usuario/salvar', [UserController::class, 'changePassword']);
    Route::post('usuario/recuperar', [UserController::class, 'recoveryPassword']);

    /* Routes for publications */
    Route::post('publicacao/getPublicacoes', [PublicationController::class, 'search']);
    Route::post('curtidas/adicionar', [PublicationController::class, 'addLike']);
    Route::post('curtidas/remover', [PublicationController::class, 'removeLike']);
    Route::post('comentario/adicionar', [PublicationController::class, 'addComment']);

    /* Routes for avaliations */
    Route::post('avaliacao/salvar', [AvaliationController::class, 'add']);

    /* Routes for surveys */
    Route::post('enquete/getEnquetes', [SurveyController::class, 'get']);
    Route::post('opiniao/salvar', [SurveyController::class, 'addAnswerByUser']);

    /* Routes for schedulings */
    Route::post('agendamento/getAgendamentos', [SchedulingController::class, 'getSchedulingByUser']);

    /* Routes for treatments */
    Route::post('tratamento/getTratamentos', [TreatmentController::class, 'getTreatmentsByUser']);

    /* Routes for budgets */
    Route::post('orcamento/buscaOrcamentos', [BudgetController::class, 'getBudgetsByUser']);

});
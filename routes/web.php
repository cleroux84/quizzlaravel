<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAnswerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'viewForm']);   

Route::post('create', [UserController::class, 'create']);

Route::get('/quizz/{id}', [QuestionController::class, 'questionRandom']);

Route::post('registerAnswer', [UserAnswerController::class, 'registerAnswer']);

Route::get('answer', [AnswerController::class, 'checkAnswer']);
/* Route::get('/answer', function () {
    return 'Hello World';
}); */



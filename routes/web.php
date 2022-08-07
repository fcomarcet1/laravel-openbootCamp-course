<?php

use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/values-from-parameters', [TestController::class, 'getValuesFromParameters']);
Route::get('/my-first-page', [TestController::class, 'firstPage']);

/*Route::get('/test/{string}', function (String $string) {

    switch ($string){
        case "hello-world":
            $result = "hello-world";
            break;
        case "hello-laravel":
            $result = "hello-laravel";
            break;
        default:
            $result = "Ups algo salio mal";
            break;
    }
    // match is similar to switch, but it can have multiple cases
    $result = match ($string) {
        "hello-world" => "hello-world",
        "hello-laravel" => "hello-laravel",
        default => "Ups algo salio mal",
    };

    return view('welcome',[
        'string' => $result
    ]);
});*/

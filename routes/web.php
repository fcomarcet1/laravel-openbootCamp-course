<?php

use App\Http\Controllers\ContactController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/contact', [ContactController::class, 'index'] )->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'] )->name('contact.store');

// more examples
// Route::put('/test', [TestController::class, 'update'] )->name('test.update');
// Route::patch('/test', [TestController::class, 'update'] )->name('test.update');
// Route::delete('/test', [TestController::class, 'destroy'] )->name('test.destroy');

// Route::match(['GET', 'POST'], '/test', [TestController::class, 'index'] )->name('test.index');
// Route::any('/test', [TestController::class, 'index'] )->name('test.index');
// Route::redirect('/origin-route', '/destination-route', 302)->name('test.index');
// Route::permanentRedirect('/origin-route', '/destination-route')->name('test.index');


Route::get('/values-from-parameters', [TestController::class, 'getValuesFromParameters']);
Route::get('/my-first-page', [TestController::class, 'firstPage']);
Route::get('/example', [TestController::class, 'index']);

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

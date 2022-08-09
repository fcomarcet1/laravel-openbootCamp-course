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

/*Route::get('/post/{category}/{slug?}', function (string $category, string $slug = null) {
    $myCategory = $this->getCategory($category);
    if ($slug !== null) {
        $post = $this->getPostBySlug($slug);
        return view('post', compact('post'));
    }
    $post = $this->getLastPost();
    return view('post', compact('post'));

})->name('post-slug');*/

Route::get('/demo', function () {
    return view('demo');
})->name('demo');

Route::get('/my-controller/{category}/{uuid}/{id?}', [TestController::class, 'testMethod'])
    ->whereAlpha('category')
    ->whereUuid('uuid')
    ->whereAlphaNumeric('id')
    ->name('my-controller');

Route::get('/test/{id}/{slug}/{uuid}', [TestController::class, 'routesWithConditions'])
    ->whereAlphaNumeric('id')
    ->whereAlpha('slug')
    ->whereUuid('uuid')
    ->name('test');

Route::get('my-second-example', [TestController::class, 'mySecondExample'])
    ->name('my-second-example');

Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])
        ->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])
        ->name('contact.store');
    Route::get('/{id}', [ContactController::class, 'show'])
        ->name('contact.show');
    Route::put('/{id}', [ContactController::class, 'update'])
        ->name('contact.update');
    Route::delete('/{id}', [ContactController::class, 'destroy'])
        ->name('contact.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [ContactController::class, 'index'])
            ->name('user.index');
        Route::post('/', [ContactController::class, 'store'])
            ->name('user.store');
        Route::get('/{id}', [ContactController::class, 'show'])
            ->name('user.show');
        Route::put('/{id}', [ContactController::class, 'update'])
            ->name('user.update');
        Route::delete('/{id}', [ContactController::class, 'destroy'])
            ->name('user.destroy');
    });
});

Route::prefix('test')->group(function () {
    Route::prefix('/{slug}')->where(['slug', '[a-zA-Z\]+'])->group(function () {
            Route::get('/', [ContactController::class, 'index'])
                ->name('user.index');
            Route::post('/', [ContactController::class, 'store'])
                ->name('user.store');
            Route::get('/{id}', [ContactController::class, 'show'])
                ->where('id', '[0-9]+')
                ->name('user.show');
            Route::put('/{id}', [ContactController::class, 'update'])
                ->whereAlphaNumeric('id')
                ->name('user.update');
            Route::delete('/{id}', [ContactController::class, 'destroy'])
                ->name('user.destroy');
    });
});

Route::domain('admin.example.com')->group(function () {
    Route::prefix('test')->group(function () {
        Route::prefix('/{slug}')->where(['slug', '[a-zA-Z\]+'])->group(function () {
            Route::get('/', [ContactController::class, 'index'])
                ->name('user.index');
            Route::post('/', [ContactController::class, 'store'])
                ->name('user.store');
            Route::get('/{id}', [ContactController::class, 'show'])
                ->where('id', '[0-9]+')
                ->name('user.show');
            Route::put('/{id}', [ContactController::class, 'update'])
                ->whereAlphaNumeric('id')
                ->name('user.update');
            Route::delete('/{id}', [ContactController::class, 'destroy'])
                ->name('user.destroy');
        });
    });
});

// route with middleware
Route::get('/test-middleware', [TestController::class, 'testMiddleware'])
    ->middleware('auth')
    ->name('test-middleware');

// route with middleware group
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/test-middleware-group', [TestController::class, 'testMiddlewareGroup'])
        ->name('test-middleware-group');
});

Route::middleware('isAdmin')
    ->prefix('admin')
    ->get('/test-middleware', [TestController::class, 'testMiddlewareGroup'])
    ->name('admin');

Route::middleware('isAjax')
    ->get('/test-ajax', [TestController::class, 'testAjax'])
    ->name('test-ajax');

// route with middleware and parameters
Route::middleware(['auth', 'CheckRole:variableRole'])
    ->get('/test-role', [TestController::class, 'testRole'])
    ->name('test-role');

Route::middleware('exampleMiddleware:all')
    ->get('/middle', [TestController::class, 'MiddlewareFunction']);


Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::get('/contact', [ContactController::class, 'index'] )->name('contact.index');
Route::middleware('validateForm')
    ->post('/contact', [ContactController::class, 'store'] )
    ->name('contact.store');

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

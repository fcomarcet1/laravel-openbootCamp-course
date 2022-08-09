<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    public function getValuesFromParameters() {

        // get values from parameters.php
        $publicKey = config('parameters.public-key');
        config('parameters.public-key', 'my-new-key');
        //var_dump($publicKey);
        //$publicKey = config('parameters.public-key');

        $privateKey = config('parameters.private-key');
        $pi = config('parameters.pi');
        $appName = config('parameters.app-name');
        //var_dump($privateKey);

        // Get value from .env
        $myEnvVariable = env('APP_NAME');
        var_dump($myEnvVariable);

        return view('welcome');
    }

    public function firstPage() {
        $name = 'Francisco Marcet';
        $lessons = ['Introduccion', 'Novedades Laravel', 'Parametros y .env', 'MVC'];

        /*return view('first-page', [
            'name' => $name,
            'lessons' => $lessons
        ]);*/

        return view('first-page', compact('name', 'lessons'));
    }


    public function index(Request $request): Response
    {
        // get value from query string localhost:8000/example?param=hello-world
        $string = $request->query('param');

        // get value from query string localhost:8000/example?string2=hello-world
        $string2 = $request->input('string2');

        // get headers from request
        $headers = $request->headers->all();
        //print_r($headers);

        // get session from request
        $session = $request->session();

        // get client ip
        $clientIp = $request->getClientIp();

        //get value from body
        $body = $request->getContent();
        //print_r($body);


        return new response('Hello World', 200);
    }

    // http://localhost:1000//my-controller/{category}/{uuid}/{id?}
    // si el id no existe, se pone un valor por defecto -> null
    public function testMethod(Request $request, $category, $uuid, $id = null) {
        echo "Hello World " . $id;
        die();
    }

    // http://localhost:1000//my-controller/{id}?param=test
    // si el id no existe, se pone un valor por defecto -> null
    public function testMethod2(Request $request,  $id = null) {
        echo "Hello World " . $id . "<br/>";
        // get parameters from url
        $param = $request->input('param');
        echo "Param: " . $param;
    }

    public function routesWithConditions(Request $request, $id, $slug): void {
        echo "Hello World " . $id . "<br/>";
        echo "Hello World " . $slug . "<br/>";
    }

    public function MiddlewareFunction(Request $request) {
        echo "Hello Middleware";
    }


}

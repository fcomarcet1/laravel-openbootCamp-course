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
        // get value from query string localhost:8000/example?string=hello-world
        $string = $request->query('string');
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
}

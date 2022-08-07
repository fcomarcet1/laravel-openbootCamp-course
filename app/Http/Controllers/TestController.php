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
}

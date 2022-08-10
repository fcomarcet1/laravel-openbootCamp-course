<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;

class BladeController extends Controller
{
    /**
     * @throws \JsonException
     */
    public function index(Request $request) {
        $format = $request->input('format', 'html');
        $year = $request->input('year');
        $maxChar = 30;
        $i = 0;
        date_default_timezone_set('Europe/Madrid');
        $date = date('Y-m-d H:i:s');
        $today = date('d-m-y H:i:s', strtotime($date));
        $timestamp = strtotime($date);
        $concepts = [
            [
               'concept' => 'Laravel license',
               'description' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
               'price' => 100,
               'currency' => 'USD',
               'taxes' => 21,
               'discount' => 3,
            ],
            [
                'concept' => 'Intellij license',
                'description' => 'IDE',
                'price' => 150,
                'currency' => 'USD',
                'taxes' => 16,
                'discount' => 0,
            ],
            [
                'concept' => 'Mac Pro',
                'description' => 'Powerfull computer',
                'price' => 3000,
                'currency' => 'USD',
                'taxes' => 13,
                'discount' => 3,
            ],
        ];

        if ($year === null) {
            $year = date('Y');
        }
        try {
            $jsonConcepts = json_encode($concepts, JSON_THROW_ON_ERROR);
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        // change to match
        /*switch ($format) {
            case 'html':
                return view('test-blade', compact('concepts', 'year', 'maxChar', 'i', 'jsonConcepts'));
            case 'json':
                //return response($jsonConcepts)->header('Content-Type', 'application/json');
                return response()->json($concepts);
            //return new JsonResponse($concepts);
            default:
                return response()->json(['error' => 'Format not found'], 404);
        }*/

        return match ($format) {
            'html' => view('test-blade', compact('concepts', 'year', 'today', 'timestamp' ,'maxChar', 'i', 'jsonConcepts')),
            'json' => response()->json($concepts),
            'base64'=> response(base64_encode($jsonConcepts)),
            default => response()->json(['error' => 'Format not found'], 404),
        };

        /*return view('test-blade', compact(
            'concepts',
            'year',
            'jsonConcepts',
            'maxChar',
            'i'
        ));*/
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyFirstPageController extends Controller
{

    public function section(string $section){
        $data = [];
        switch ($section) {
            case 'home':
                date_default_timezone_set('Europe/Madrid');
                $data['actualTime'] = date('d-m-Y H:i:s');
                $data['user'] = \Session::get('name', 'Usuario');
                break;
            case 'contact':
                break;
            case 'about-us':
                $data['user'] = \Session::get('name', 'Usuario');
                $data['name'] = 'Francisco Marcet Prieto';
                $data['age'] = '95';
                $data['country'] = 'Spain';
                $data['profession'] = 'Backend Developer';
                $data['section'] = $section;
                break;
        }
        return view("my-first-page.$section", $data);
        /*return match ($section) {
            'home' => 'about',
            'contact' => 'contact',
            'about-us' => 'introduction',
        };*/
    }


    public function index() {
        date_default_timezone_set('Europe/Madrid');
        $actualTime = date('d-m-Y H:i:s');
        $user = \Session::get('name', 'Usuario');

        return view('my-first-page.home', compact('actualTime', 'user'));
    }

    public function personalize(Request $request) {
        $name = $request->input('name');
        \Session::put('name', $name);
        return redirect()->back();
    }

    public function contact() {
        return view('my-first-page.contact');
    }

    public function contactProcess(Request $request) {
        $input = $request->only('name', 'email', 'message');
        if (!isset($input['name'], $input['email'], $input['message'])) {
            return view('my-first-page.error');
        }
        // validate form
        $validator = \Validator::make($input, [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return view('my-first-page.error');
        }
        return view('my-first-page.success');
    }

    public function aboutUs() {
        $user = \Session::get('name', 'Usuario');
        $name = 'Francisco Marcet Prieto';
        $age = '95';
        $country = 'Spain';
        $profession = 'Backend Developer';
        $section = 'about-us';

        return view('my-first-page.about-us', compact(
            'name',
            'age',
            'country',
            'profession',
            'section',
            'user'
        ));
    }
}

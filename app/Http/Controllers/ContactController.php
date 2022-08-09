<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index() {
        return view('contact.index');
    }


    public function store(Request $request) {
        $input = $request->input();
        return redirect()->route('home');
        //return view('contact.success', $input);
    }
}

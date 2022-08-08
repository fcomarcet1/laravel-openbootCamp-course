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

    /**
     * @throws ValidationException
     */
    public function store(Request $request) {
        //validate the request
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        //get inputs from form
        $name = $request->input('name') ?: null;
        $email = $request->input('email') ?: null;
        $message = $request->input('message') ?: null;
        dump($name, $email, $message);
        //var_dump($name);
        die();
    }
}

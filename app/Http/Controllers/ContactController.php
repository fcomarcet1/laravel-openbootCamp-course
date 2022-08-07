<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function index() {
        return view('contact.index');
    }

    public function store()
    {
        // do anything you want here
    }
}

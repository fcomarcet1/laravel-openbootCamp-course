<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private string $testMessage;
    private \DateTime $testDate;
    private string $title;

    public function __construct(){
        //$this->middleware('auth');
        $this->testMessage = 'Hello World';
        $this->testDate = new \DateTime();
        //$this->title = $this->printTitle();
        $this->printTitle();
        ;
    }

    public function index() {
        echo $this->testMessage;
        echo '<br>';
        echo $this->testDate->format('d-m-H H:i:s');
    }

    // http://localhost:1000/admin/{param}
    public function getParamFromUrl(Request $request, $param = null) {
        if ($param !== null) {
            echo $param;
        }
    }

    public function printTitle(){
        return $this->title = 'Hello from AdminController function';
    }

}

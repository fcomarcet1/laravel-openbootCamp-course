<?php

namespace App\Http\Controllers;

use App\Exceptions\MyCustomException;
use Illuminate\Http\Request;

class LereleController extends Controller
{
    /**
     * @throws MyCustomException
     */
    public function index() {
        try {
             $test = 1 / 0;
             $this->_generateException();
             echo $test;
        }catch (MyCustomException $e){
            // custom exception
            echo $e->getMessage();
        }
        catch (\Exception $e){
            // general exception
            echo $e->getMessage();
        }
    }

    /**
     * @throws MyCustomException
     */
    public function _generateException() {
        throw new MyCustomException('custom exception');
    }
}

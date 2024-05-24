<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
        //echo "Hello";
         return view('Second');
    }
}

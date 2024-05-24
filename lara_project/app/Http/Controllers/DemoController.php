<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class DemoController extends Controller
{
    public function index(){
        return view('form');
    }
    public function Register(Request $request){
$request->validate(
    [
        'email' => 'required',
        'pwd' => 'required'
    ]
);

       echo"<pre>";
        print_r($request->email);
        echo"<br>";
        print_r($request->pwd);
    }
}

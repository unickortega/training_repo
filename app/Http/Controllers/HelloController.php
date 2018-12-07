<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $data = [
            'firstname' => "Ernest Wesley",
            'lastname' => "Man-on"
        ];
        return view('hello.index',$data);
    }
}

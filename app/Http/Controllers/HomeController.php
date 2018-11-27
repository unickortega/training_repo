<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentId = Auth::id();
        $company = Company::findOrFail($currentId);
        return view('home')->with(compact('company'));
    }

    public function thisId(){
        return $this->Auth::User()->id;
    }
}

<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

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
        return view('/dashboard');
    }

    // public function returnHome()
    // {
    //     return view('home');
    // }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function newloginPage(){
        return view('auth.loginnew');
    }

    public function newRegisterPage(){
        return view('auth.registernew');
    }
}
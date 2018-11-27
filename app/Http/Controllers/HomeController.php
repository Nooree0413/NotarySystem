<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Datatables;

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

   

    public function newRegisterPage(){
        return view('auth.registernew');
    }

    public function propertyRegistration(){
        $users = DB::table('users')->get();
        return view('auth.propertyRegistration')->with('users',$users);
    }

    public function generateContract(){
        // $users = DB::table('users')->get();
        return view('auth.generateContract');
    }

    public function newRegisterSpousePage(){
        $users = DB::table('users')->get();
        return view('auth.registrationSpouse')->with('users',$users);
        
    }
}

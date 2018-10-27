<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\user;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Datatables;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendMail;
use Mail;
use Illuminate\Support\Facades\Hash;



class userController extends Controller
{
    public function add_user(Request $request){
        
        $this->validate($request,
        [
            'inputFirstName' => 'required|alpha|max:255',
            'inputLastName' => 'required|alpha|max:255',
            'inputContactNum' => 'required|digits:8|unique:users,contactnum',
            'inputEmail' => 'required|string|email|max:255|unique:users,email',
            'inputDob' => 'required',
            'inputGender' => 'required',
            'inputAddress' => 'required',
            'inputNIC1' => 'required'
             ]       
        );

        

        $fname = Input::get('inputFirstName');
        $lname = Input::get('inputLastName');
        $email = Input::get('inputEmail');
        $dob = Input::get('inputDob');
        $contactnum = Input::get('inputContactNum');
        $gender = Input::get('inputGender');

        $generatedPassword=str_random(8);
        self::sendEmail($generatedPassword,$email,$fname,$lname);

        
        $data = array(
            'firstname' => $fname, 
            'lastname' => $lname, 
            'email' => $email, 
            'password' => Hash::make($generatedPassword),
            'dob' => $dob, 
            'contactnum' => $contactnum,
            'gender' => $gender,
            
        );

        //  DB::table('users')->insert($data);
         $user_id = DB::table('users')->insertGetId($data);
         $user=(DB::table('users')->where('id',$user_id)->get())[0];
         Mail::send('emails.email_invitation', $data, function($m) use ($user){
            $m->to($user->email, 'Notary System')->from('hi@example.com', 'Notary System')->subject('Login Credentials');
            });

        flashy()->success($fname.' '.$lname. ' successfully added!.');
        return redirect('/dashboard');
        
    }

    public function sendEmail($genPass,$email,$fname,$lname)
    {
        \Mail::send(new sendMail($genPass,$email,$fname,$lname));
    }

    public function viewUsers()
    {
        $users = DB::table('users')->get();
       return view('users.viewUser')->with('users',$users);

        
    }
}

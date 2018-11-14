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
            'inputContactNum' => 'required|regex:/^[5][0-9]{7}+$/u|integer|unique:users,contactnum',
            'inputEmail' => 'required|string|email|max:255|unique:users,email',
            'inputDob' => 'required|date',
            'inputGender' => 'required|alpha|max:255',
            'inputAddress' => 'required',
            'inputMarriageStatus' => 'required',
            'inputRoles' =>'required',
            'inputNIC1' => 'required|alpha_num|unique:users,nic',
            'inputBcNum' => 'required|numeric',
            'inputDistrict' =>'required',
            'inputPlaceOfBirth' =>'required',
            'inputProfession' =>'required',
            'inputTitle' =>'required',
             ]       
        );

        

        $fname = Input::get('inputFirstName');
        $lname = Input::get('inputLastName');
        $email = Input::get('inputEmail');
        $dob = Input::get('inputDob');
        $contactnum = Input::get('inputContactNum');
        $gender = Input::get('inputGender');
        $address= Input::get('inputAddress');
        $marriageStatus=Input::get('inputMarriageStatus');
        $roles=Input::get('inputRoles');
        $nic=Input::get('inputNIC1');
        $title=Input::get('inputTitle');
        $profession=Input::get('inputProfession');
        $bcNum=Input::get('inputBcNum');
        $districtIssued=Input::get('inputDistrict');
        $placeOfBirth=Input::get('inputPlaceOfBirth');

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
            'address' =>$address,
            'nic' => $nic,
            'roles' => $roles,
            'marriageStatus' => $marriageStatus,
            'birthCertificateNumber' =>$bcNum,
            'districtIssued' => $districtIssued,
            'placeOfBirth' =>$placeOfBirth,
            'profession'=>$profession,
            'title'=> $title

            
        );

        //  DB::table('users')->insert($data);
         $user_id = DB::table('users')->insertGetId($data);
         $user=(DB::table('users')->where('id',$user_id)->get())[0];
         Mail::send('emails.email_invitation', $data, function($m) use ($user){
            $m->to($user->email, 'Notary System')->from('hi@example.com', 'Notary System')->subject('Login Credentials');
            });

        
        // return redirect('/dashboard');

        if($marriageStatus=="Married"){
            flashy()->success($fname.' '.$lname. ' successfully added!.');
            return redirect('/registerSpouse');
        }
        else{
            flashy()->success($fname.' '.$lname. ' successfully added!.');
            return redirect('/dashboard');

        }

        

        
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

    public function add_spouse(Request $request){
        $this->validate($request,
        [
            'inputSpouseFirstName'=> 'required|alpha|max:255',
            'inputSpouseTitle' =>'required',
            'inputSpouseNIC' => 'required|alpha_num|unique:spouse,spouseNic',
            'inputID' => 'required|numeric',
            'inputSpouseDob' =>'required|date',
            'inputSpouseBcNum' => 'required|numeric',
            'inputSpouseDistrict' =>'required',
            'inputSpouseMarriageDate' =>'required|date',
            'inputMcNum' => 'required|numeric',
            'inputMcDistrict' =>'required',
            'inputSpouseProfession' =>'required',
            'inputSpouseRoles' =>'required',
            'inputSpouseGender' =>'required',
            'inputSpousePlaceOfBirth' =>'required',
             ]       
        );

        $fname=Input::get('inputSpouseFirstName');
        $title=Input::get('inputSpouseTitle');
        $nic=Input::get('inputSpouseNIC');
        $spouseid=Input::get('inputID');
        $dob=Input::get('inputSpouseDob');
        $bcNum=Input::get('inputSpouseBcNum');
        $bcDistrict=Input::get('inputSpouseDistrict');
        $marriageDate=Input::get('inputSpouseMarriageDate');
        $mcNum=Input::get('inputMcNum');
        $mcDistrict=Input::get('inputMcDistrict');
        $profession=Input::get('inputSpouseProfession');
        $roles=Input::get('inputSpouseRoles');
        $gender=Input::get('inputSpouseGender');
        $placeOfBirth=Input::get('inputSpousePlaceOfBirth');

        $data = array(
            'spouseId' => $spouseid,
            'title' =>$title,
            'firstname' =>$fname,
            'dob' =>$dob,
            'birthCertificateNumber' =>$bcNum,
            'BCdistrictIssued' =>$bcDistrict,
            'placeOfBirth' =>$placeOfBirth,
            'gender' => $gender,
            'spouseNic' =>$nic,
            'marriageDate' =>$marriageDate,
            'MarriageCertificateNumber' => $mcNum,
            'MCdistrictIssued' => $mcDistrict,
            'profession' =>$profession,
            'roles' => $roles

            
        );

        //  DB::table('spouse')->insert($data);
        $id = DB::table('spouse')->insertGetId($data);
        // $user=(DB::table('spouse')->where('id',id)->get())[0];

        flashy()->success($fname. ' successfully added!.');
            return redirect('/registernew');

    }
}

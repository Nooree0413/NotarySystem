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
            'inputClientID' => 'required',
            'inputSpouseFirstName'=> 'required|alpha|max:255',
            'inputSpouseLastName'=> 'required',
            'inputSpouseTitle' =>'required',
            'inputSpouseNIC' => 'required|alpha_num|unique:users,spouseNic',
           
            'inputSpouseDob' =>'required|date',
            'inputSpouseBcNum' => 'required|numeric',
            'inputSpouseDistrict' =>'required',
            'inputSpouseMarriageDate' =>'required|date',
            'inputMcNum' => 'required|numeric',
            'inputMcDistrict' =>'required',
            'inputSpouseProfession' =>'required',
           
            'inputSpouseGender' =>'required',
            'inputSpousePlaceOfBirth' =>'required',
             ]       
        );

        $clientId=Input::get('inputClientID');
        $fname=Input::get('inputSpouseFirstName');
        $lname=Input::get('inputSpouseLastName');
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
     
        $gender=Input::get('inputSpouseGender');
        $placeOfBirth=Input::get('inputSpousePlaceOfBirth');

       
        
       $query= DB::table('users')
                    ->where("id", $clientId)
                    ->update([
                        'spouseTitle' =>$title,
                        'spouseFirstname' =>$fname,
                        'spouseLastname' =>$lname,
                        'spouseDob' =>$dob,
                        'spouseBCNum' =>$bcNum,
                        'spouseBCdistrictIssued' =>$bcDistrict,
                        'spousePlaceOfBirth' =>$placeOfBirth,
                        'spouseGender' => $gender,
                        'spouseNic' =>$nic,
                        'marriageDate' =>$marriageDate,
                        'MCNumber' => $mcNum,
                        'MCdistrictIssued' => $mcDistrict,
                        'spouseProfession' =>$profession
                        
                    ]); 

       

        flashy()->success($fname.' '.$lname. ' successfully added!.');
            return redirect('/registernew');

    }

    public function add_property(Request $request){

        $propertyType=Input::get('inputPropertyType');
        $clientId=Input::get('inputClientID');
        $propertyAdd=Input::get('inputAddress');
        $sizeMsFigures=Input::get('inputSizeMsF');
        $sizeMsWords=Input::get('inputSizeMsW');
        $sizeInPerch=Input::get('inputSizeInPerch');
        $transcriptionVol=Input::get('inputTranscriptionVolume');
        $pinNum=Input::get('inputPinNum');
        $regNumInLsReport=Input::get('inputRegNum');
        $surveyorFirstName=Input::get('inputLsFn');
        $surveyorLastName=Input::get('inputLsLn');
        $surveyingDate=Input::get('inputSurveyingDate');
        $priceFigures=Input::get('inputPriceFigures');
        $priceWords=Input::get('inputPriceWords');
        $firstDeedReg=Input::get('inputFirstDeedReg');
        $firstDeedGeneration=Input::get('inputFirstDeedGeneration');
        $previousNotaryTitle=Input::get('inputPreviousNotaryTitle');
        $previousNotaryFN=Input::get('inputPreviousNotaryFN');
        $previousNotaryLN=Input::get('inputPreviousNotaryLN');
        $districtSituated=Input::get('inputDistrict');
        $taxduty=(0.05*$priceFigures);

        $data = array(
            'clientId' =>  $clientId, 
            'address' => $propertyAdd, 
            'priceInFigures' =>  $priceFigures, 
            'priceInWords' =>  $priceWords,
            'propertyType' => $propertyType, 
            'sizeInMSFigures' =>   $sizeMsFigures,
            'sizeInMSWords' => $sizeMsWords,
            'sizeInPerchWords' => $sizeInPerch,
            'taxDuty' => $taxduty,
            'transcriptionVol' => $transcriptionVol,
            'pinNum' =>  $pinNum,
            'regNumLSReport' =>$regNumInLsReport,
            'surveyorFN' => $surveyorFirstName,
            'surveyorLN' =>$surveyorLastName,
            'surveyorDate'=>$surveyingDate,
            'firstDeedRegistration'=>$firstDeedReg,
            'firstDeedGeneration'=>$firstDeedGeneration,
            'previousNotaryFN'=>$previousNotaryFN,
            'previousNotaryLN'=>$previousNotaryLN,
            'previousNotaryTitle'=>$previousNotaryTitle,
            'districtSituated'=>$districtSituated



   
        );

        DB::table('immovableproperty')->insert($data);
         return $taxduty;

    }
}

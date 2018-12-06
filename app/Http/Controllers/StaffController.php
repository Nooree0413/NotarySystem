<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\user;
use App\Meeting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Mail\sendMail;
use Mail;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Calendar;

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('staff')->with('users',$users);
    
    }

    public function newRegisterPage(){
        return view('auth.registernew');
    }

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
            return redirect('staff/registerSpouse');
        }
        else{
            flashy()->success($fname.' '.$lname. ' successfully added!.');
             return redirect('staff/registernew');

        }  
    }

    public function sendEmail($genPass,$email,$fname,$lname)
    {
        \Mail::send(new sendMail($genPass,$email,$fname,$lname));
    }

    public function newRegisterSpousePage(){
        $users = DB::table('users')->get();
        return view('auth.registrationSpouse')->with('users',$users);
        
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
            return redirect('staff/registernew');
    }

    public function propertyRegistration(){  
        $users = DB::table('users')->get();
        return view('auth.propertyRegistration')->with('users',$users);
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

    public function generateContract(){
         $users = DB::table('users')->get();
         $properties= DB::table('immovableproperty')->get();
        return view('auth.generateContract')->with('users',$users)->with('properties',$properties);
    }

    public function myProfile(){
        $staff_id = Auth::user()->id;  
        $staff_get=DB::table('staff') 
        ->where(['id'=>$staff_id])
        ->get();

        $staff_get =  $staff_get[0];
        return view('Staff.staffProfile')->with('staff_detail',  $staff_get);

    
    }

    public function profileupdate(Request $request)
    {
        $staff_id = Auth::user()->id;
        $image=$request->file('fpropic');

        $title=Input::get('txtTitle');
        $fname = Input::get('txtfname');
        $lname = Input::get('txtlname');
        $email=Input::get('txtemail');
        $cnum = Input::get('txtcnum');
        $dob = Input::get('txtdob');
        $nic = Input::get('txtnic');
        $gender=Input::get('txtgender');

        $this->validate($request,
            [
                'txtfname' => 'required',
                'txtlname' => 'required',
                'txtcnum' => 'required',
                'txtemail' => 'required',
                'txtdob' => 'required',
                'txtnic' => 'required',
                'txtTitle' => 'required',
                'txtgender'=>'required'
            ]);

             // Handle File Upload
        if(isset($image)) { //to check if user has selected an image
            if($request->hasFile('fpropic')){

                $this->validate($request,
                [
                    'fpropic' => 'mimes:jpeg,jpg,png | max:1999'      
                ]);
                
                // Get filename with the extension
                $filenameWithExt = $request->file('fpropic')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just the file extension
                $extension = $request->file('fpropic')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $request->file('fpropic')->storeAs('public/images', $fileNameToStore);
            }

         DB::table('staff')
        ->where('id', $staff_id)
        ->update(['img_path' => $fileNameToStore
        ]);
       
    }
        DB::table('staff')
           ->where('id', $staff_id)
           ->update([
                    'title'=>$title,
                   'firstname' => $fname,
                   'lastname' => $lname,
                   'email' => $email,
                   'dob' =>$dob,
                   'nic'=>$nic,
                   'contactnum' => $cnum,
                   'gender' => $gender
                   
        ]);
        flashy()->success( ' successfully updated!.');

        return redirect('/staff/profile/view');
        
    }

     //function to show the calendar with all meetings
    public function meeting(){
       // $meetings = Meeting::get();
        $meetings=DB::table('meetings')->get();
    	$meeting_list = [];
    	foreach ($meetings as $key => $meeting) {
    		$meeting_list[] = Calendar::event(
                $meeting->meetingReason,
                false, //to enable the user to view the date and time as well on the calendar
                new \DateTime($meeting->startTime),
                new \DateTime($meeting->endTime.' +1 day')
            );
    	}
    	$calendar_details = Calendar::addEvents($meeting_list); 
 
        return view('meetings', compact('calendar_details') );
}
public function addMeeting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meetingReason' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
 
        if ($validator->fails()) {
        	\Session::flash('warnning','Please enter the valid details');
            return Redirect::to('staff/meetings')->withInput()->withErrors($validator);
        }
 
        $meeting = new Meeting;
        $meeting->meetingReason = $request['meetingReason'];
        $meeting->startTime = $request['startTime'];
        $meeting->endTime = $request['endTime'];
        $meeting->save();
 
        \Session::flash('success','Meeting added successfully.');
        return Redirect::to('staff/meetings');
    }

    public function showUploadForm(){
        $transactions=DB::table('transaction')->get();
        $users=DB::table('users')->get();
        return view('Staff.uploadContract')->with('users',$users)->with('transactions',$transactions);
    }

    public function uploadContract(Request $request){
        $upload=$request->file('contract');
        $clientName=Input::get('inputClientName');

        if(isset($upload)){
            $name = $_FILES['contract']['name'];
            $mime = $_FILES['contract']['type'];
            $datas = file_get_contents($_FILES['contract']['tmp_name']);
            $path = $request->file('contract')->storeAs('public/images', $name);
            $data = array(
                'clientId' =>  $clientName, 
                'name' => $name, 
                'mime'=>$mime,
                'generatedContract' =>  $datas 
                
            );
    
            DB::table('transaction')->insert($data);
            return "successfull";
    
        }

        
    }

    public function viewContract($id){
        $transactions=DB::table('transaction')->where('id', $id)->get();
        return view('Staff.viewContract')->with('transactions',$transactions);
    }
}

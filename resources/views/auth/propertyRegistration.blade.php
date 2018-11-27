@include('flashy::message')
@extends('layouts.userlayout')
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
     {{-- <link rel="stylesheet" type="text/css" href="login.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/css/register.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('images/addUser.png')}}" />
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    <script>
       
    </script>
</head>
   
@section('content')
<h1 class="datatableTitleUsers"> Registration</h1>
<div class="container tableSpacor" style="border: 3mm ridge #212529;">
    <table id="tbluser" class="table table-hover " style="width:100%;">
            <thead>
                <tr>
                    <th>
                        ID
                     </th> 
                     <th>
                        NIC
                     </th>
                    <th>
                        First Name
                    </th> 
                    <th>
                        Last Name
                    </th>
                    <th>
                       Gender
                    </th> 
                    <th>
                        Roles
                    </th> 
                         
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr >
                    <td>    
                        {{$user->id}} 
                    </td>
                    <td>    
                        {{$user->nic}} 
                    </td>
                    <td>    
                        {{$user->firstname}} 
                    </td>
                    <td>
                        {{$user->lastname}}
                    </td>
                    
                    <td>
                        {{$user->gender}}
                    </td>

                    <td>
                        {{$user->roles}}
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<form method="POST" action="" id="frmAddUser">
    @csrf
    <fieldset class="addUserFieldset">
        <legend class="addUserLegend">Registration</legend>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           
                    
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPropertyType">Property Type</label>
                    <select  name="inputPropertyType" class="form-control">
                        <option selected>Land</option>
                        <option>Company</option>
                        <option>Hotel</option>
                        <option>House</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputClientID">Buyer/Seller ID</label>
                    <input type="number" required class="form-control" name="inputClientID" value="{{ old('inputClientID') }}"  autofocus>      
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Address</label>
                    <textarea rows="1" cols="50" type="text" required  class="form-control" name="inputAddress" value="{{ old('inputAddress') }}"  ></textarea>
               </div>
                
             </div>

            <div class="form-row">  
            <div class="form-group col-md-4">
              <label for="inputSizeMsF">Size In Meter Squares(Figures)</label>
              <input type="number"  required class="form-control " name="inputSizeMsF" value="{{ old('inputSizeMsF') }}"  > 
            </div>

            <div class="form-group col-md-4">
                <label for="inputSizeMsW">Size In Meter Squares(Words)</label>
                <input type="text"  required class="form-control " name="inputSizeMsW" value="{{ old('inputSizeMsW') }}"  autofocus  placeholder=""> 
            </div>
           

            <div class="form-group col-md-4">
                <label for="inputSizeInPerch">Size In Perch(Words)</label>
                <input type="text"  required class="form-control " name="inputSizeInPerch" value="{{ old('inputSizeInPerch') }}"  autofocus  placeholder=""> 
            </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputTranscriptionVolume">Transcription Volume(If any)</label>
                    <input type="text"  class="form-control " name="inputTranscriptionVolume" value="{{ old('inputTranscriptionVolume') }}"  autofocus > 
                </div>

                <div class="form-group col-md-4">
                    <label for="inputPinNum">Pin Number</label>
                    <input type="number"  value="{{ old('inputPinNum') }}"   class="form-control" name="inputPinNum"  >
                </div>

                    <div class="form-group col-md-4">
                        <label for="inputRegNum">Reg no. In Surveyor's Report</label>
                        <input type="text" class="form-control " name="inputRegNum" value="{{ old('inputRegNum') }}"  autofocus > 
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputLsFn">Land Surveyor First Name</label>
                  <input type="text"  class="form-control" name="inputLsFn" value="{{ old('inputLsFn') }}"  >
                  
                </div>
                <div class="form-group col-md-4">
                    <label for="inputLsLn">Land Surveyor Last Name</label>
                    <input type="text"  class="form-control" name="inputLsLn" value="{{ old('inputLsLn') }}"  > 
                </div>

                <div class="form-group col-md-4">
                    <label for="inputSurveyingDate">Surveying Date</label>
                    <input type="date"  class="form-control" name="inputSurveyingDate" value="{{ old('inputSurveyingDate') }}"  > 
                </div>
                 
      </div>
      <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputPriceFigures">Price(In words)</label>
            <input type="number"  class="form-control" name="inputPriceFigures" value="{{ old('inputPriceFigures') }}"  >
            
            </div>
            <div class="form-group col-md-6">
                <label for="inputPriceWords">Price(In Figures)</label>
                <input type="text"  class="form-control" name="inputPriceWords" value="{{ old('inputPriceWords') }}"  > 
            </div>
         
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputFirstDeedReg">First Deed Registration</label>
            <input type="date"  class="form-control" name="inputFirstDeedReg" value="{{ old('inputFirstDeedReg') }}"  >
            
            </div>
            <div class="form-group col-md-4">
                <label for="inputFirstDeedGeneration">First Deed Generation</label>
                <input type="date"  class="form-control" name="inputFirstDeedGeneration" value="{{ old('inputFirstDeedGeneration') }}"  > 
            </div>

            <div class="form-group col-md-4">
                <label for="inputDistrict">District Situated</label>
                <select  name="inputDistrict" class="form-control">
                <option selected>Port Louis</option>
                <option>Moka</option>
                <option>Flacq</option>
                <option>Grand Port</option>
                <option>Pamplemousses</option>
                <option>Plaine Wilhems</option>
                <option>Rivière du Rempart</option>
                <option>Rivière Noire</option>
                <option>Savanne</option>
                </select>
            </div>
         
        </div>
        <div class="form-row">  
            <div class="form-group col-md-4">
              <label for="inputPreviousNotaryTitle">Previous Notary Title</label>
              <select  name="inputPreviousNotaryTitle" class="form-control">
                <option selected>Monsieur</option>
                <option>Madame</option>
                <option>Mademoiselle</option>
                </select>
                </div>

            <div class="form-group col-md-4">
                <label for="inputPreviousNotaryFN">Previous Notary Firstname</label>
                <input type="text"  required class="form-control " name="inputPreviousNotaryFN" value="{{ old('inputPreviousNotaryFN') }}"  autofocus  placeholder=""> 
            </div>
           

            <div class="form-group col-md-4">
                <label for="inputPreviousNotaryLN">Previous Notary Lastname</label>
                <input type="text"  required class="form-control " name="inputPreviousNotaryLN" value="{{ old('inputPreviousNotaryLN') }}"  autofocus  placeholder=""> 
            </div>

            </div>
            <input type="submit" name="btnSubmit" class="btn btn-success btn-block" value="Add Property">
        </div>
    </fieldset>
</form>
@endsection

</html>
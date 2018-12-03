@include('flashy::message')
@extends('layouts.stafflayout')
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
<h1 class="datatableTitleUsers"> Contract Generation</h1>

<form method="POST" action="{{ route('createWord') }}" id="frmAddUser">
    @csrf
    <fieldset class="addUserFieldset">
        <legend class="addUserLegend">Contract</legend>
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
           
                    <br><br>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    <label for="inputSellerId">Seller ID</label>
                    <select name="inputSellerId" id="inputSellerId" class="form-control input-lg dynamic" >
                        <option value="">Select id</option>
                        @foreach($users as $user)
                       <option value="{{ $user->id}}">{{$user->id}}<?php echo"-"?>{{$user->firstname}}<?php echo" "?>{{$user->lastname}}</option>
                        @endforeach
                       </select>                
                    </div>
                <div class="form-group col-md-4">
                        <label for="inputBuyerId">Buyer ID</label>
                        <select name="inputBuyerId" id="inputBuyerId" class="form-control input-lg dynamic" >
                            <option value="">Select id</option>
                            @foreach($users as $user)
                           <option value="{{ $user->id}}">{{$user->id}}<?php echo"-"?>{{$user->firstname}}<?php echo" "?>{{$user->lastname}}</option>
                            @endforeach
                           </select>                       
                        </div>

                    <div class="form-group col-md-4">
                            <label for="inputPropertyId">Property ID</label>
                            <select name="inputPropertyId" id="inputPropertyId" class="form-control input-lg dynamic" >
                                <option value="">Select id</option>
                                @foreach($properties as $property)
                               <option value="{{ $property->propertyId}}">{{$property->propertyId}}</option>
                                @endforeach
                               </select>                          
                            </div>
                
             </div>

             <div class="form-row">
                
                <div class="form-group col-md-6">
                    <label for="input2ndRegDate">Second Regristration Date</label>
                    <input type="text" required class="form-control" name="input2ndRegDate" value="{{ old('input2ndRegDate') }}"  autofocus>      
                </div>
                <div class="form-group col-md-6">
                        <label for="input2ndTVNum">Second Transcription Volume Number</label>
                        <input type="text" required class="form-control" name="input2ndTVNum" value="{{ old('input2ndTVNum') }}"  autofocus>      
                </div>
             </div>

             <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputSurveyorDescription">Land Surveyor Description(Optional)</label>
                  <textarea rows="5" cols="100" type="text" required  class="form-control" name="inputSurveyorDescription" value="{{ old('inputSurveyorDescription') }}"  ></textarea>                  
                </div>
                 
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputClauses">Clauses</label>
                  <textarea rows="5" cols="100" type="text" required  class="form-control" name="inputClauses" value="{{ old('inputClauses') }}"  ></textarea>                  
                </div>
                 
            </div>
      {{-- <a href="/generateWord" class="btn btn-danger">Genrerate Word Document</a> --}}

            <input type="submit" name="btnSubmit" class="btn btn-success btn-block" value="Generate Contract">
        </div>
    </fieldset>
</form>
@endsection

</html>
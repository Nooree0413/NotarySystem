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
</head>
   


    
@section('content')
    {{-- <div class="registerBox"> --}}
    {{-- <img src="{{ asset('images/avatar.png') }}" class="avatar"> --}}
    {{-- <a class="centerLink" href="{{ route('loginnew') }}">Already have an account?Login here!</a> --}}
        <h1>Client Registration</h1>

        <form method="POST" action="{{ route('add_user') }}" id="frmAddUser">
            @csrf
            <fieldset class="addUserFieldset">
                <legend class="addUserLegend">Registration</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control{{ $errors->has('inputFirstName') ? ' is-invalid' : '' }}" name="inputFirstName" value="{{ old('inputFirstName') }}" required autofocus  placeholder="First Name">
                    {{-- @if ($errors->has('inputFirstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inputFirstName') }}</strong>
                                    </span>
                                @endif --}}
                  </div>
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control {{ $errors->has('inputLastName') ? ' is-invalid' : '' }}" name="inputLastName" value="{{ old('inputLastName') }}" required autofocus placeholder="Last Name">
                    {{-- @if ($errors->has('inputLastName'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('inputLastName') }}</strong>
                    </span>
                @endif --}}
                
                  </div>
                
             </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control {{ $errors->has('inputEmail') ? ' is-invalid' : '' }}" name="inputEmail" value="{{ old('inputEmail') }}" required autofocus  placeholder="Email">
                {{-- @if ($errors->has('inputEmail'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('inputEmail') }}</strong>
                </span>
            @endif --}}
              </div>
              
            <div class="form-group col-md-6">
              <label for="inputDob">Date of Birth</label>
              <input type="date" class="form-control {{ $errors->has('inputDob') ? ' is-invalid' : '' }}" name="inputDob" value="{{ old('inputDob') }}" required autofocus  placeholder="Date of Birth">
              {{-- @if ($errors->has('inputDob'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('inputDob') }}</strong>
              </span>
          @endif   --}}
            </div>
            </div>
            <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputContactNum">Contact Number</label>
                        <input type="tel" class="form-control{{ $errors->has('inputContactNum') ? ' is-invalid' : '' }}" name="inputContactNum" value="{{ old('inputContactNum') }}" required autofocus placeholder="Contact Number">
                        {{-- @if ($errors->has('inputContactNum'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('inputContactNum') }}</strong>
                            </span>
                         @endif --}}
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputGender">Gender</label>
                        <select  name="inputGender" style="background-color:#000000d6;" class="form-control">
                        <option selected>Male</option>
                        <option>Female</option>
                        </select>
                </div>
            </div>
            
           
            <input type="submit" name="btnSubmit" class="btn btn-success btn-block" value="Register">
            {{-- <button class="button">Add User</button>   --}}
            </fieldset>
          </form>
          {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Already have an account?Login here!') }}</a></a>|  <a class="centerLink" href="">Your password will be automatically generated and send to you by mail</a> --}}
    

@endsection
</html>
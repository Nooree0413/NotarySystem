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
    {{-- <div class="registerBox"> --}}
    {{-- <img src="{{ asset('images/avatar.png') }}" class="avatar"> --}}
    {{-- <a class="centerLink" href="{{ route('loginnew') }}">Already have an account?Login here!</a> --}}
        <h1 class="datatableTitleUsers">Client Registration</h1>

        <form method="POST" action="{{ route('add_user') }}" id="frmAddUser">
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

                </div>
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
              </span> --}}
          {{-- @endif   --}}
            </div>
            </div>
            <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputContactNum">Contact Number</label>
                        <input type="tel" min="8" maxlength="8"   title="8 digits code only and starting with number '5'." class="form-control{{ $errors->has('inputContactNum') ? ' is-invalid' : '' }}" name="inputContactNum" value="{{ old('inputContactNum') }}"  >
                         {{-- @if ($errors->has('inputContactNum')) 
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('inputContactNum') }}</strong>
                            </span>
                         @endif  --}}
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputGender">Gender</label>
                        <select  name="inputGender" class="form-control">
                        <option selected>Male</option>
                        <option>Female</option>
                        </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputNIC1">NIC Number</label>
                  <input type="text"  maxlength="14" class="form-control{{ $errors->has('inputNIC1') ? ' is-invalid' : '' }}" name="inputNIC1" value="{{ old('inputNIC1') }}" required >
                  {{-- @if ($errors->has('inputNIC1'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('inputNIC1') }}</strong>
                      </span>
                   @endif --}}
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text"  class="form-control{{ $errors->has('inputAddress') ? ' is-invalid' : '' }}" name="inputAddress" value="{{ old('inputAddress') }}"  >
                    @if ($errors->has('inputAddress'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('inputAddress') }}</strong>
                        </span>
                     @endif
                  </div>
      </div>
      <div class="form-row">
        {{-- <label for="inputMarriageStatus">Marriage Status: </label> --}}
        <div class="form-group col-md-3">
            
            <input type="checkbox" name="inputMarriageStatus" value="Single" >Single<br>
        </div>
        <div class="form-group col-md-3">
            {{-- <label for="inputMarriageStatus">Marriage Status</label> --}}
            <input type="checkbox" name="inputMarriageStatus" value="Married" >Married<br>
        </div>
        <div class="form-group col-md-3">
            {{-- <label for="inputMarriageStatus">Marriage Status</label> --}}
            <input type="checkbox" name="inputMarriageStatus" value="Divorced" >Divorced<br>
        </div>
        <div class="form-group col-md-3">
            {{-- <label for="inputMarriageStatus">Marriage Status</label> --}}
            <input type="checkbox" name="inputMarriageStatus" value="Widowed" >Widowed<br>
        </div>
      </div>
            
           
            <input type="submit" name="btnSubmit" class="btn btn-success btn-block" value="Register">
            {{-- <button class="button">Add User</button>   --}}
            </fieldset>
          </form>
          {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Already have an account?Login here!') }}</a></a>|  <a class="centerLink" href="">Your password will be automatically generated and send to you by mail</a> --}}
    

@endsection
<script>
 if ($('#checkbox').is(':checked'))
</script>
</html>
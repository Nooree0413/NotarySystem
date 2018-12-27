@include('flashy::message')
@extends('layouts.stafflayout')
<head>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style4.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> --}}
            {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}"> --}}
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        
               <style>
               .header {
                width: 97.2%;
                margin-left:1.5%;
                background-color: #17a2b8;
                color: #ffffff;
                padding: 5px;
                font-size: 5px !important;
            }
        
               </style> 
        
        </head>

@section('content')
<form action="{{route('meetings.add')}}" method="POST">
                       
                        @csrf
                      <div class="row">
                          
                      <div class="col-6">
                        {{-- <h2>Details</h2> --}}
                              <label for="partyId">Party ID</label>
                              <select name="partyId" id="partyId" class="form-control " >
                                  <option value="">Select name</option>
                                  @foreach($users as $user)
                                 <option value="{{ $user->id}}">{{$user->id}}<?php echo"-"?>{{$user->firstname}}<?php echo" "?>{{$user->lastname}}<?php echo"-"?>{{$user->roles}}</option>
                                  @endforeach
                                 </select>   
                  
                              <label for="meetingReason">Meeting Reason</label><br>
                              <input type="text" id="meetingReason" name="meetingReason" value="" class="form-control"><br>

                              <label for="startTime">Start Time</label>
                              <input type="datetime-local" id="startTime" name="startTime" value=""class="form-control"><br>
                          
                              <label for="endTime">Start Time</label>
                              <input type="datetime-local" id="endTime" name="endTime" value=""class="form-control"><br>
                     
                              <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="party" id="inlineRadio1" value="Client">
                                    <label class="form-check-label" for="inlineRadio1">Client</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="party" id="inlineRadio2" value="RGD">
                                    <label class="form-check-label" for="inlineRadio2">RGD</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="party" id="inlineRadio3" value="Bank" >
                                    <label class="form-check-label" for="inlineRadio3">Bank </label>
                                  </div>
                      
                            </div>

                  </div>
                  <br>
                  <input type="submit" name="btnSubmit" class="btn btn-success btn-block" value="add">
                </form>
@endsection
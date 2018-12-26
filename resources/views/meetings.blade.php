@include('flashy::message')
@extends('layouts.meetinglayout')
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">

    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
 
    <link rel="stylesheet" type="text/css" href="{{asset('/css/register.css')}}"> 
    <!-- Scripts -->
    {{-- <script src="http://code.jquery.com/jquery.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
  <script>
    $(document).ready(function(){
     $("#demo1").hide();
      $("#demo2").hide();
       $("#demo3").hide();
     
      $("#addMeeting").click(function(){
        $("#demo1").show();
         $("#demo2").hide();
       $("#demo3").hide();
        
      });
      
      $("#updateMeeting").click(function(){
        $("#demo2").show();
         $("#demo1").hide();
       $("#demo3").hide();
        
      });
      $("#delMeeting").click(function(){
        $("#demo3").show();
         $("#demo1").hide();
       $("#demo2").hide();
        
      });
    });
    </script>
</head>

@section('content')

<div class="row" style="width:93% !important;">
    <div class="col-3">
      <div class="container" style="width:93% !important;">
        <button class="btn btn-primary" id="addMeeting">Add Meeting</button>
        <div id="demo1" class="collapse">
      
        </div>
        </div>
    </div>
  
    <div class="col-3">
      <div class="container" style="width:93% !important;">
        <button class="btn btn-primary" id="updateMeeting">Update Meeting</button>
        <div id="demo2" class="collapse">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>
    </div>
    <div class="col-3">
      <div class="container" style="width:93% !important;">
        <button class="btn btn-primary" id="delMeeting">Delete Meeting</button>
        <div id="demo3" class="collapse">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>
    </div>

      <div class="col-3">
          <div class="container">
            <a class=" btn-info btn-lg" href="/staff"><i class="fa fa-home hvr-icon"></i> Back</a>
            
          </div>
    </div>
    </div>
  <br><br>
  <div class="row" >
    <div class="col-12">
      
      
    
    </div>
  </div>
    {{-- <div class="panel panel-primary" >

     <div class="panel-heading"style="background-color:#17a2b8; border-color:#17a2b8;">Add Meeting</div>

      <div class="panel-body">    

            {!! Form::open(array('route' => 'meetings.add','method'=>'POST','files'=>'true')) !!} 
      <form action="{{route('meetings.add')}}" method="POST" files="true">
        @csrf
           <div class="row">
               <div class="col-12">
                  @if (Session::has('success'))
                     <div class="alert alert-success">{{ Session::get('success') }}</div>
                  @elseif (Session::has('warnning'))
                      <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                  @endif

              </div>

              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {{-- {!! Form::label('event_name','Event Name:') !!} --}}
                    {{-- <label>Meeting Reason</label>
                    <div class=""> --}}
                     {{-- {!! Form::text('event_name', null, ['class' => 'form-control']) !!}  --}}
                    {{-- <input type="text" name=="meetingReason" required class="form-control" >
                    {!! $errors->first('meetingReason', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                </div>
              </div>

              <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                  {{-- {!! Form::label('start_date','Start Date:') !!} --}}
                  {{-- <label>Start Time</label> --}}
                  {{-- <div class=""> --}}
                  {{-- {!! Form::date('start_date', null, ['class' => 'form-control']) !!} --}}
                  {{-- <input type="datetime-local" name=="startTime" required class="form-control"> --}}

                  {{-- {!! $errors->first('startTime', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
                </div>
              </div> --}} 

              {{-- <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                  {{-- {!! Form::label('end_date','End Date:') !!} --}}
                  {{-- <label>End Time</label> --}}
                  {{-- <div class=""> --}}
                  {{-- {!! Form::date('end_date', null, ['class' => 'form-control']) !!} --}}
                  {{-- <input type="datetime-local" name=="endTime" required class="form-control" > --}}

                  {{-- {!! $errors->first('endTime', '<p class="alert alert-danger">:message</p>') !!} --}}
                  {{-- </div>
                </div>
              </div>  --}}

              {{-- <div class="col-xs-2 col-sm-2 col-md-2 text-center"> &nbsp;<br/>
                <div class="form-group">
                  <div class=""> --}}
              {{-- {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!} --}}
              {{-- <label></label>
              <input type="submit" name="submitMeeting" class="btn btn-info  btn-block ">
                  </div>
                </div>
              </div>
            </div>
      </form> --}}

     {{-- </div>

    </div>  --}}

    <div class="panel panel-primary" style="width: 93%;">
      <div class="panel-heading"style="background-color:#17a2b8; border-color:#17a2b8;">Meeting Details</div>
      <div class="panel-body" >
          {!! $calendar_details->calendar() !!}
      </div>
    </div>

    
   
@endsection
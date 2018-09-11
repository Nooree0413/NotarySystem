@include('flashy::message')
@extends('layouts.userlayout')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/footer.css')}}">
<script src="{{url('js/bootstrap.min.js')}}"></script>
{{-- <script src="{{url('js/bootstrap.min.js')}}"></script> --}}
@section('content')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}"> --}}

<script>
    $(document).ready(function() {
        $(document).bootstrap();
        $('#tbluser').DataTable(
            {'responsive':'true'
            "bFilter": true}
        );
}

 $(window).on('load', function() {
    $(".loader2").fadeOut("slow");
    });
</script>
<h4 class="datatableTitleUsers">Users</h4>
<table id="tbluser" class=" table table-striped nowrap">
    <thead>
        <tr>
            <th>
                First Name
            </th> 
            <th>
                Last Name
            </th>
            <th>
                Date of Birth
            </th>
            <th>
                Email-Address
            </th> 
            <th>
                Contact Number
            </th> 
            <th>
               Gender
            </th> 
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr >
            <td>    
                {{$user->firstname}} 
            </td>
            <td>
                {{$user->lastname}}
            </td>
            <td>
                {{$user->dob}}
            </td>
            <td>
                {{$user->email}}
            </td>
            <td>
                {{$user->contactnum}}
            </td>
            <td>
                {{$user->gender}}
            </td>
            <td>
                {{-- Show Event Button --}}
                    {{-- <a href="/usersfound/show/{{$user->id}}"> --}}
                        <span data-tooltip tabindex="1" style="border-bottom:none" title="show">
                            <i class="fas fa-eye"></i>
                        </span>
                    </a> 
                {{-- /Show Button --}}
                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- Edit User Button --}}
                    {{-- <a class="editbtn" data-open="editusermod" data-mycontactnum="{{$user->contactnum}}" data-myfirstname="{{$user->firstname}}" data-mylastname="{{$user->lastname}}" data-myemail="{{$user->email}}" data-userid="{{$user->id}}" data-target="#editusermod"> --}}
                        <span style="border-bottom:none" data-tooltip tabindex="1" title="Edit">
                            <i class="fas fa-pencil-alt font-color"></i> 
                        </span>
                    </a>
                {{-- /Edit User Button --}}
                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                
                {{-- Delete User Button --}}
                    @if ($user->id== Auth::id()) 
                        <a class="btndelevent not-active-link disabled" href="/usersfound/delete/{{$user->id}}">
                            <span style="border-bottom:none" data-tooltip tabindex="1" title="Delete">
                                <i class="fas fa-trash-alt font-color"></i>
                            </span>
                        </a>
                    @else
                        <a class="btndelevent" href="/usersfound/delete/{{$user->id}}">
                            <span style="border-bottom:none" data-tooltip tabindex="1" title="Delete">
                                <i class="fas fa-trash-alt font-color"></i>
                            </span>
                        </a>
                    @endif
                {{-- /Delete User Button --}}
                &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                {{-- Show transactions Button --}}
                    {{-- <a href="/usersfound/show/{{$user->id}}"> --}}
                        <span data-tooltip tabindex="1" style="border-bottom:none" title="">
                            <i class="fas fa-handshake"></i>
                        </span>
                    </a> 
                {{-- /Show Button --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<footer>
    <img src="{{ asset('images/certificate.png') }}" class="footerlogo" alt="logo notary">  Copyright &copy; <script type="text/JavaScript"> var theDate=new Date(); document.write(theDate.getFullYear()); </script> NW Mauritius.
 </footer>
@endsection
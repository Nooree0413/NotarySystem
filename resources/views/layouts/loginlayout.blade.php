<html>
<head>
<title>Login Form Design</title>
    {{-- <link rel="stylesheet" type="text/css" href="login.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    {{-- <script src="{{url('js/bootstrap.min.js')}}"></script> --}}
</head>
   

<body>
    <div class="loginbox">
            @yield('content')
    </div>
<html>
<head>
<title>Login</title>
    {{-- <link rel="stylesheet" type="text/css" href="login.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/footer.css')}}">
    {{-- <script src="{{url('js/bootstrap.min.js')}}"></script> --}}
</head>
   

<body>
    <h1 class="datatableTitleUsers" style="color:white; padding-top:3%;">Welcome to Mauritius e-Notary</h1>
    <div class="loginbox">
            @yield('content')
    </div>
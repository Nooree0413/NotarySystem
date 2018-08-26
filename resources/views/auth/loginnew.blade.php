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
    <img src="{{ asset('images/avatar.png') }}" class="avatar">
        <h1>Notary System</h1>
        <form>
            <p>Username</p>
            <input type="text" name="" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <input type="submit" name="" value="Login">
            <a href="#">Forgot your password?</a>&nbsp;|&nbsp;<a href="{{ route('registernew') }}">Don't have an account?</a>
        </form>
        
    </div>

</body>
</html>
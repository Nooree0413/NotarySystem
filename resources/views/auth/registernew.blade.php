<html>
<head>
<title>Register</title>
    {{-- <link rel="stylesheet" type="text/css" href="login.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <script src="{{url('js/bootstrap.min.js')}}"></script>
</head>
   

<body>
    
    
    <div class="loginbox">
    {{-- <img src="{{ asset('images/avatar.png') }}" class="avatar"> --}}
        <h1>Notary System</h1>
        <form>
            <p>Username</p>
            <input type="text" name="" placeholder="Enter Username">
            <p>Email Address</p>
            <input type="email" name="" placeholder="Enter E-mail Address">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <p>Confirm Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <p>Contact Number</p>
            <input type="tel" name="" placeholder="Enter ContactNumber">
            <input type="submit" name="" value="Login">
            <a href="{{ route('loginnew') }}">Already have an account? Log in here!</a>
        </form>
        
    </div>

</body>
</html>
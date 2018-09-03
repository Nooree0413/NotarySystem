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
        <form method="POST" action="{{ route('login') }}">
            <p>Email</p>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            
            <p>Password</p>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <input type="submit" name="" value="Login">
            <a href="#">Forgot your password?</a>&nbsp;|&nbsp;<a href="{{ route('registernew') }}">Don't have an account?</a>
        </form>
        
    </div>

</body>
</html>
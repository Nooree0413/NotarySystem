@extends('layouts.userlayout')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">

<script src="{{url('js/bootstrap.min.js')}}"></script>
@section('content')
<body>
<div>
    <h1 style="text-align:center;">Welcome to the notary system</h1>

    

    <a href="/generateWord" class="btn btn-danger">Genrerate Word Document</a>
{{-- <a href="{{ route('loginnew') }}" class="btn btn-success">Go to new login</a> --}}
</div>


{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
 @include('flashy::message') 
</body>
@endsection
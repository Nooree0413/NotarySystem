@extends('layouts.userlayout')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
<script src="{{url('js/bootstrap.min.js')}}"></script>
@section('content')
<div>
    <h1 style="text-align:center;">Welcome to the notary system</h1>

    <p>A notary public (or notary or public notary) of the common law is a public officer constituted by law to serve the public in non-contentious matters usually concerned with estates, deeds, powers-of-attorney, and foreign and international business. A notary's main functions are to administer oaths and affirmations, take affidavits and statutory declarations, witness and authenticate the execution of certain classes of documents, take acknowledgments of deeds and other conveyances, protest notes and bills of exchange, provide notice of foreign drafts, prepare marine or ship's protests in cases of damage, provide exemplifications and notarial copies, and perform certain other official acts depending on the jurisdiction.[1] Any such act is known as a notarization. 
        The term notary public only refers to common-law notaries 
        and should not be confused with civil-law notaries.
    </p>

    <a href="/generateWord" class="btn btn-danger">Genrerate Word Document</a>
<a href="{{ route('loginnew') }}" class="btn btn-success">Go to new login</a>
</div>
@endsection
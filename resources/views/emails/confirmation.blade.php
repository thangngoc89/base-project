@extends('emails.base_email')

@section('body')
<h2>Verify Your Email Address</h2>

<div>
    <p>Hi {{ $username }},</p>
    Thanks for creating an account with the verification demo app.
    Please follow the link below to verify your email address<br/>
    <a href="{{ url('auth/verify/' . $confirmation_code) }}">{{ url('auth/verify/' . $confirmation_code) }}</a><br/>
</div>
@endsection
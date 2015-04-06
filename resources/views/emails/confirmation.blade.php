@extends('emails.base_email')

@section('body')
<h2>{!! trans('auth.emails.confirmation.title') !!}</h2>

<div>
    {!! trans('auth.emails.confirmation.body', [
            'username' => $username,
            'app_name' => setting('app_name'),
        ])
    !!}
    <br/>
    <a href="{{ route('register.verify', $confirmation_code) }}">
        {{ route('register.verify', $confirmation_code) }}</a>
    <br/>
</div>
@endsection
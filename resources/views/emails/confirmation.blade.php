@extends('emails.base_email')

@section('body')
<h2>{{ $title }}</h2>

<div>
    {!! trans('auth.emails.confirmation.body', [
            'username' => $user->username,
            'app_name' => setting('app_name'),
        ])
    !!}
    <br/>
    <a href="{{ route('register.verify', $confirmation_code) }}">
        {{ route('register.verify', $confirmation_code) }}</a>
    <br/>
</div>
@endsection
@extends('emails.base_email')

@section('body')
    <h2>{{ $title }}</h2>

    <div>
        {!! trans('auth.emails.welcome.body', [
                'username' => $user->username
            ]);
        !!}
    </div>
@endsection
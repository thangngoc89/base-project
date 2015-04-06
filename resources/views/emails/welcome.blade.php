@extends('emails.base_email')

@section('body')
    <h2>{{ trans('auth.emails.welcome.title', [
                'app_name' => setting('app_name'),
            ])
        }}
    </h2>

    <div>
        {!! trans('auth.emails.welcome.body') !!}
    </div>
@endsection
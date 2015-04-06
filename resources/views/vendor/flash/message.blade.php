@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }}" data-autoclose>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <div class="container">
                <b>{{ Session::get('flash_notification.message') }}</b>
            </div>
        </div>
    @endif
@endif

{{--Validation Errors Go Here--}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        <div class="container">
            <p>{{ trans('app.something_wrong_with_your_inputs') }}</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
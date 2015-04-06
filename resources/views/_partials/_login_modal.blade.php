<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" data-register="{{ trans('auth.register_with') }}" data-login="{{ trans('auth.login_with') }}">
                    {{ trans('auth.login_with') }}</h4>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a class="circle github" href="/auth/github">
                                <i class="fa fa-github fa-fw"></i>
                            </a>
                            <a id="google_login" class="circle google" href="/auth/google_oauth2">
                                <i class="fa fa-google-plus fa-fw"></i>
                            </a>
                            <a id="facebook_login" class="circle facebook" href="/auth/facebook">
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                        </div>
                        <div class="division">
                            <div class="line l"></div>
                            <span>or</span>
                            <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                            <form method="post" action="/login" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="{{ trans('auth.email_address') }}" name="email">
                                <input id="password" class="form-control" type="password" placeholder="{{ trans('auth.password') }}" name="password">
                                <input class="btn btn-default btn-login" type="button" value="{{ trans('auth.login') }}" onclick="loginAjax()">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <form method="post" html="{:multipart=>true}" data-remote="true" action="{{ url('/auth/register') }}" accept-charset="UTF-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input id="username" class="form-control" type="text" placeholder="{{ trans('app.username') }}" name="username">
                                <input id="name" class="form-control" type="text" placeholder="{{ trans('app.name') }}" name="name">
                                <input id="email" class="form-control" type="text" placeholder="{{ trans('auth.email_address') }}" name="email">
                                <input id="password" class="form-control" type="password" placeholder="{{ trans('auth.password') }}" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="{{ trans('auth.password_confirm') }}" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="submit" value="{{ trans('auth.create_account') }}" name="commit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                    <span><a href="javascript: showRegisterForm();">{{ trans('auth.create_an_account') }}</a>?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>{{ trans('auth.already_have_an_account') }}</span>
                    <a href="javascript: showLoginForm();">{{ trans('auth.login') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
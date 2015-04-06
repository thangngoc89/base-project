<?php

return [
    "messages" => [
        "account_created"                           => "Tài khoản của bạn đã được khởi tạo thành công",
        "account_created_waiting_for_confirmation"  => "Tài khoản của bạn đã được tạo thành công. Hãy nhấn vào link trong email để xác nhận tài khoản",
        "invalid_confirmation_code"                 => "Mã xác nhận không hợp lệ",
    ],

    "emails" => [
        "confirmation" => [
            "title" => "Kích hoạt tài khoản tại ". setting('app_name'),
            "body"  => "<p>Chào :username,</p>
                        <p>Cảm ơn bạn đã tạo tài khản tại :app_name</p>
                        <p>Hãy nhấn vào liên kết bên dưới để kích hoạt tài khoản và hoàn tất quá trình đăng kí</p>",
        ],
        
        "welcome" => [
            "title" => "Chào mừng đến với ". setting('app_name'),
            "body"  => "<p>:username đã hoàn tất quá trình đăng kí tại ". setting('app_name'). "</p>",
        ],
    ],

    'login'             => 'Đăng nhập',
    'login_with'        => 'Đăng nhập bằng',
    'register'          => 'Đăng kí',
    'register_with'     => 'Đăng kí bằng',
    'logout'            => 'Đăng xuất',
    'remember'          => 'Ghi nhớ đăng nhập',
    'email_address'     => 'Email',
    'password'          => 'Mật khẩu',
    'password_confirm'  => 'Nhập lại mật khẩu',
    'forgot_your_password' => 'Quên mật khẩu?',
    'already_have_an_account' => 'Đã có tài khoản?',
    'create_an_account' => 'Tạo tài khoản mới',
    'create_account'    => 'Tạo tài khoản',

];
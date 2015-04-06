<?php
namespace App\Library\Mailer;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

interface Mailer {

    /**
     * Send Email To User
     *
     * @param AuthenticatableContract $user
     * @param string $title
     * @param array $data
     * @param string $template
     * @param null $senderEmail
     * @param null $senderName
     */
    public function sendTo(AuthenticatableContract $user, $title, $data = [], $template, $senderEmail = null, $senderName = null);

}
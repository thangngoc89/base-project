<?php
namespace App\Library\Mailer;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

interface Mailer {

    /**
     * Send Email To User
     *
     * @param string $email_address
     * @param string $title
     * @param array $data
     * @param string $template
     * @param null $senderEmail
     * @param null $senderName
     */
    public function sendTo($email_address, $title, $data = [], $template, $senderEmail = null, $senderName = null);

}
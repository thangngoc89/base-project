<?php
namespace App\Library\Mailer;

use App\Library\Mailer\Mailer;

interface AuthMailer extends Mailer
{
    /**
     * @param $user
     * @param $confirmation_code
     * @return mixed
     */
    public function sendConfirmationEmail($user, $confirmation_code);

}
<?php
namespace App\Library\Mailer\Laravel;

use App\Library\Mailer\AuthMailer;

class LaravelAuthMailer extends LaravelMailer implements AuthMailer
{
    /**
     * @param $user
     * @param $confirmation_code
     * @return mixed|void
     */
    public function sendConfirmationEmail($user, $confirmation_code)
    {
        $title = trans('auth.emails.confirmation.title');

        $data = compact('user', 'confirmation_code');

        return $this->sendTo($user, $title, $data, 'emails.confirmation');
    }
}
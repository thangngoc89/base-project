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

        $this->sendTo($user->email, $title, $data, 'emails.confirmation');
    }

    /**
     * @param $user
     * @return mixed|void
     */
    public function sendWelcomeEmail($user)
    {
        $title = trans('auth.emails.welcome.title');

        $data = compact('user');

        $this->sendTo($user->email, $title, $data, 'emails.welcome');
    }
}
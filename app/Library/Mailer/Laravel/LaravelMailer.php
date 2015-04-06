<?php
namespace App\Library\Mailer\Laravel;

use Illuminate\Contracts\Mail\Mailer as IlluminateMailer;
use App\Library\Mailer\Mailer;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class LaravelMailer implements Mailer
{
    /**
     * @var LaravelMailer
     */
    private $mail;

    /**
     * @param LaravelMailer $mail
     */
    public function __construct()
    {
        $mail = app(IlluminateMailer::class);
        $this->mail = $mail;
    }

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
    public function sendTo(AuthenticatableContract $user, $title, $data = [], $template, $senderEmail = null, $senderName = null)
    {
        $senderEmail = ($senderEmail) ?: setting('app_email');
        $senderName = ($senderName) ?: setting('admin_name');

        $data = $this->pushTitleIntoData($title, $data);

        $this->mail->send($template, $data, function ($message) use ($user, $senderEmail, $senderName, $title) {
            $message->from($senderEmail, $senderName);

            $message->to($user->email)
                ->subject($title);
        });
    }

    /**
     * @param $title
     * @param $data
     * @return mixed
     */
    public function pushTitleIntoData($title, $data)
    {
        $data['title'] = $title;

        return $data;
    }
}
<?php
namespace App\Handlers\Events\Auth;

use App\Events\Auth\UserConfirmedEvent;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendWelcomeEmail implements ShouldBeQueued
{
    /**
     * @var Mailer
     */
    private $mail;

    /**
     * Create the event handler.
     *
     * @param Mailer $mail
     */
	public function __construct(Mailer $mail)
	{
        $this->mail = $mail;
    }

	/**
	 * Handle the event.
	 *
	 * @param  UserConfirmedEvent  $event
	 * @return void
	 */
	public function handle(UserConfirmedEvent $event)
	{
		$user = $event->user;

        $this->sendWelcomeEmail($user);
	}

    public function sendWelcomeEmail($user)
    {
        $username = $user->username;
        $data = compact('username');

        $this->mail->send('emails.welcome', $data, function ($message) use ($user) {
            //TODO: Change this to a app's setting
            $message->from('hi@example.com', 'Khoa Nguyen');
            $message->to($user->email)->subject('Welcome to website name');
        });
    }

}

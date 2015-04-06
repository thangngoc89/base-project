<?php
namespace App\Handlers\Events\Auth;

use App\Events\Auth\UserConfirmedEvent;

use App\Library\Mailer\AuthMailer as Mailer;
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

    /**
     * @param $user
     */
    public function sendWelcomeEmail($user)
    {
        $this->mail->sendWelcomeEmail($user);
    }

}

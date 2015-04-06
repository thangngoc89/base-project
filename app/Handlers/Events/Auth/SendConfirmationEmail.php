<?php
namespace App\Handlers\Events\Auth;

use App\Events\Auth\UserRegistration as Events;
use App\Library\Mailer\AuthMailer;
use App\Models\UserConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class SendConfirmationEmail implements ShouldBeQueued
{
    /**
     * @var AuthMailer
     */
    private $mail;

    /**
     * Create the event handler.
     * @param AuthMailer $mail
     */
	public function __construct(AuthMailer $mail)
	{
        $this->mail = $mail;
    }

	/**
	 * Handle the event.
	 *
	 * @param  Events  $event
	 * @return void
	 */
	public function handle(Events $event)
	{
		$user = $event->user;

        $confirmation_code = $this->createNewConfirmationCode($user);

        $this->sendConfimationEmail($user, $confirmation_code);
    }

    /**
     * @param $user
     * @return string $id
     */
    public function createNewConfirmationCode($user)
    {
        $confirmation = new UserConfirmation();
        $confirmation->user()->associate($user);
        $confirmation->save();

        return $confirmation->id;
    }

    /**
     * @param $confirmation_code
     * @param $user
     */
    public function sendConfimationEmail($user,  $confirmation_code)
    {
        $this->mail->sendConfirmationEmail($user, $confirmation_code);
    }

}

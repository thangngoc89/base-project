<?php
namespace App\Handlers\Events\Auth;

use App\Events\Auth\UserRegistration as Events;

use App\Models\UserConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Contracts\Mail\Mailer;

class SendConfirmationEmail implements ShouldBeQueued
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
	 * @param  Events  $event
	 * @return void
	 */
	public function handle(Events $event)
	{
		$user = $event->user;

        $confirmation_code = $this->createNewConfirmationCode($user);

        $this->sendConfimationEmail($confirmation_code, $user);
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
    public function sendConfimationEmail($confirmation_code, $user)
    {
        $username = $user->username;
        $data = compact('confirmation_code', 'username');

        $this->mail->send('emails.confirmation', $data, function ($message) use ($user) {
            $message->from(setting('app_email'), setting('admin_name'));

            $message->to($user->email)
                    ->subject(trans('auth.emails.confirmation.title'));
        });
    }

}

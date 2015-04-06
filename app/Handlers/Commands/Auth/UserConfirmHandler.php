<?php
namespace App\Handlers\Commands\Auth;

use App\Commands\Auth\UserConfirm;
use App\Events\Auth\UserConfirmedEvent;
use App\Models\UserConfirmation;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Queue\InteractsWithQueue;

class UserConfirmHandler
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * Create the command handler.
     *
     * @param Guard $auth
     */
	public function __construct(Guard $auth)
	{
        $this->auth = $auth;
    }

	/**
	 * Handle the command.
	 *
	 * @param  UserConfirm  $command
	 * @return \Illuminate\Http\Response
	 */
	public function handle(UserConfirm $command)
	{
		$code = $command->code;

        $userConfirmation = UserConfirmation::find($code);

        if (is_null($userConfirmation))
        {
            return trans('auth.messages.invalid_confirmation_code');
        }

        $user = $userConfirmation->user;

        $this->setConfirmStatus($user);

        $this->deleteUsedConfirmationCode($userConfirmation);

        event(new UserConfirmedEvent($user));

        $this->loginUser($user);

        return redirect('/');
	}

    /**
     * @param $user
     * @internal param $userConfirmation
     */
    public function setConfirmStatus($user)
    {
        $user->confirmed = true;

        $user->save();
    }

    /**
     * @param $userConfirmation
     */
    public function deleteUsedConfirmationCode($userConfirmation)
    {
        $userConfirmation->delete();
    }

    /**
     * @param $user
     */
    public function loginUser($user)
    {
        $this->auth->login($user);
    }
}

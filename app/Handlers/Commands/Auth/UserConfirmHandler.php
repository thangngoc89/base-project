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

        if (is_null($userConfirmation)) {
            return $this->invalidConfirmationCodeHandler();
        }

        $user = $userConfirmation->user;

        // This should be only an exception in development mode.
        if (is_null($user)) {
            return $this->invalidConfirmationCodeHandler();
        }

        $this->setConfirmStatus($user);

        $this->deleteUsedConfirmationCode($userConfirmation);

        event(new UserConfirmedEvent($user));

        $this->loginUser($user);

        flash()->success(trans('auth.messages.confirmation_success'));

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

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function invalidConfirmationCodeHandler()
    {
        flash()->error(trans('auth.messages.invalid_confirmation_code'));

        return redirect('/');
    }
}

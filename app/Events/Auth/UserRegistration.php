<?php namespace App\Events\Auth;

use App\Events\Event;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Event {

	use SerializesModels;
    /**
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
	public function __construct(User $user)
	{
        $this->user = $user;
    }

}

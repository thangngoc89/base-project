<?php namespace App\Commands\Auth;

use App\Commands\Command;

class UserConfirm extends Command {
    /**
     * @var
     */
    public $code;

    /**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($code)
	{
        $this->code = $code;
    }

}

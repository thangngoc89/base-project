<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Library\Helpers\Uuid\UuidModel;

class User extends UuidModel implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * User Confirmation Code relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function confirmation()
    {
        return $this->hasOne(\App\Models\UserConfirmation::class);
    }

    /**
     * Email mutator
     * @param $value
     */
    public function setEmailAttribute($value)
    {
        $this->email = strtolower(trim($value));
    }
}

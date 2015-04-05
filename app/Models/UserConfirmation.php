<?php
namespace App\Models;

use App\Library\Helpers\Uuid\UuidModel;

class UserConfirmation extends UuidModel
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

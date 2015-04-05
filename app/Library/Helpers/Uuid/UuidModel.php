<?php
namespace App\Library\Helpers\Uuid;

use Illuminate\Database\Eloquent\Model;
use App\Library\Helpers\Uuid\Uuid;

class UuidModel extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate($model);
        });
    }
}
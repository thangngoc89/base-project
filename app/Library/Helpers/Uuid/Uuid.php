<?php
namespace App\Library\Helpers\Uuid;

use Webpatser\Uuid\Uuid as BaseUuid;

class Uuid
{
    public static function generate($model = null)
    {
        do {
            $uuid = (string) BaseUuid::generate(4);
            if ( ! $model )
                return $uuid;
        } while ( ! static::isValidUuid($uuid, $model) );

        $uuid = str_replace('-','', $uuid);

        return $uuid;
    }

    /**
     * Find uuid in database and return true if there is no duplicate uuid
     *
     * @param $uuid
     * @param $model
     * @return bool
     */
    private static function isValidUuid($uuid, $model)
    {
        $modelClass = get_class($model);
        $find = call_user_func("\\$modelClass::find", $uuid);
        return is_null ( $find );
    }
}
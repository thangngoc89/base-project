<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        $this->addSetting('app_name','KhoaNguyen.Me');
        $this->addSetting('app_email','no-reply@khoanguyen.me');
        $this->addSetting('admin_name', 'Khoa Nguyen');
    }

    /**
     * Insert new record into settings table
     *
     * @param $key
     * @param $value
     */
    private function addSetting($key, $value)
    {
        \DB::table('settings')->insert([
            'key'      => $key,
            'value'    => $value,
            'preload'  => true,
        ]);
    }
}
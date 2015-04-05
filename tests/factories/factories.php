<?php

$factory('App\Models\User', array(
    'name' => $faker->sentence,
    'username' => $faker->unique()->userName,
    'email' => $faker->unique()->email,
    'password' => $faker->words,
));
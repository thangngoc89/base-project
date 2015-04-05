<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->string('id',32)->index()->unique();
            $table->primary('id');
            $table->string('name');
            $table->string('username', 20)->nullable()->default(null)->unique();
            $table->string('email')->nullable()->default(null)->unique();
            $table->string('password', 60);
            $table->boolean('confirmed')->default(false);
            $table->rememberToken();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}

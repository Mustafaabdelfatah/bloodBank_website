<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('password')->unique();
			$table->string('name');
			$table->date('dob');
			$table->integer('blood_type_id')->unsigned();
			$table->date('donation_last_date');
			$table->integer('pin_code');
			$table->integer('city_id')->unsigned();
			$table->boolean('is_active')->default(1);
			$table->string('api_token',60)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}

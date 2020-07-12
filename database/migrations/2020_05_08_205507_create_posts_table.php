<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('category_id')->unsigned();
			$table->string('title');
			$table->string('image')->default('default.png');
			$table->longText('content');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}

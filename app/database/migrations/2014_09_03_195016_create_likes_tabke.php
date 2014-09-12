<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikesTabke extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('likes_tabke', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('status_id')->index();
			$table->integer('user_id')->index();
			$table->boolean('value');
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
		Schema::drop('likes_tabke');
	}

}

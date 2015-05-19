<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberPercentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_percents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('uid');
			$table->json('sport')->nullable();
			$table->json('lottery')->nullable();
			$table->json('casino')->nullable();
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
		Schema::drop('member_percents');
	}

}

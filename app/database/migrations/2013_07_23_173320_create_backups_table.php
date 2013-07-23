<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backups', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('user_id');
       		$table->foreign('user_id')->references('id')->on('users');

	        $table->timestamp('added_on');
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
		Schema::drop('backups');
	}

}

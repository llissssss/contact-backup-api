<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackupsContactesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backups_contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('backup_id');
			$table->string('name')->nullable();
			$table->string('surname')->nullable();
			$table->string('email')->nullable();
			$table->string('phone_number')->nullable();
       		$table->foreign('backup_id')->references('id')->on('backups');

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
		Schema::drop('backups_contacts');
	}

}
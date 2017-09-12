<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSendmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sendmails', function(Blueprint $table)
		{
			$table->integer('SendMailId', true);
			$table->integer('UserID')->nullable();
			$table->string('IsMailSent', 45)->nullable();
			$table->date('Date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sendmails');
	}

}

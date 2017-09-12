<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donations', function(Blueprint $table)
		{
			$table->integer('DId');
			$table->string('DTitle', 50);
			$table->string('Ddescription', 100);
			$table->integer('TotalAmount');
			$table->integer('Ticket');
			$table->integer('DCId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('donations');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailconfirmationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emailconfirmations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('UserID');
			$table->char('code', 32)->nullable();
			$table->integer('createdAt')->nullable();
			$table->integer('modifiedAt')->nullable();
			$table->char('confirmed', 1)->nullable()->default('N');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emailconfirmations');
	}

}

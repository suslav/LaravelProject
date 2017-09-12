<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDialyschduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dialyschdule', function(Blueprint $table)
		{
			$table->integer('DSId', true);
			$table->time('DSTime');
			$table->string('Title', 50);
			$table->string('Description', 100);
			$table->string('ImageUrl', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dialyschdule');
	}

}

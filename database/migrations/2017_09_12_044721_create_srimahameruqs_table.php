<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSrimahameruqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('srimahameruqs', function(Blueprint $table)
		{
			$table->integer('SMMQuestionID', true);
			$table->string('SMMQuestion', 5000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('srimahameruqs');
	}

}

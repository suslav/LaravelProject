<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSrimahameruanswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('srimahameruanswers', function(Blueprint $table)
		{
			$table->integer('SMMAnswerID', true);
			$table->string('SMMAnswer', 5000);
			$table->integer('SMMQuestionID');
			$table->integer('VisitorFormID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('srimahameruanswers');
	}

}

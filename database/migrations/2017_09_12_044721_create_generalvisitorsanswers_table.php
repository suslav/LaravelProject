<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralvisitorsanswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generalvisitorsanswers', function(Blueprint $table)
		{
			$table->integer('GVAnswerID', true);
			$table->string('GVAnswer', 5000);
			$table->integer('GVQuestionID');
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
		Schema::drop('generalvisitorsanswers');
	}

}

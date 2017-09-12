<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralvisitorsinteranswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generalvisitorsinteranswers', function(Blueprint $table)
		{
			$table->integer('GVIAnswerID', true);
			$table->string('GVIAnswer', 5000);
			$table->integer('GVIQuestionID');
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
		Schema::drop('generalvisitorsinteranswers');
	}

}

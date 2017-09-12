<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralvisitorsqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generalvisitorsqs', function(Blueprint $table)
		{
			$table->integer('GVQuestionID', true);
			$table->string('GVQuestion', 5000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('generalvisitorsqs');
	}

}

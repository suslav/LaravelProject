<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralvisitorsinterqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generalvisitorsinterqs', function(Blueprint $table)
		{
			$table->integer('GVIQuestionID', true);
			$table->string('GVIQuestion', 5000);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('generalvisitorsinterqs');
	}

}

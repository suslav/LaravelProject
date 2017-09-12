<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSvcanswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('svcanswer', function(Blueprint $table)
		{
			$table->integer('SVCAnswerID', true);
			$table->string('SVCAnswer', 5000);
			$table->integer('SVCQuestionID');
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
		Schema::drop('svcanswer');
	}

}

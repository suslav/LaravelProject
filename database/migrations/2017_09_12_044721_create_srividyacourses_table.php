<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSrividyacoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('srividyacourses', function(Blueprint $table)
		{
			$table->integer('CourseID', true);
			$table->string('CouresTitle', 50);
			$table->date('CourseFromDate');
			$table->date('CourseToDate');
			$table->string('CourseDescription', 800);
			$table->string('CourseImageUrl', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('srividyacourses');
	}

}

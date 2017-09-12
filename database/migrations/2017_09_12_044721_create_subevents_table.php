<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubeventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subevents', function(Blueprint $table)
		{
			$table->integer('SubeventID', true);
			$table->string('SubeventTitle', 50);
			$table->string('SubeventDescription', 50);
			$table->date('SubeventDate');
			$table->integer('EventID');
			$table->string('SubeventUrl', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subevents');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideolistsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videolists', function(Blueprint $table)
		{
			$table->integer('VideoId', true);
			$table->string('VideoTitle', 200);
			$table->string('VideoDescription', 500);
			$table->string('VideoThumbUrl', 100);
			$table->string('VideoEmbedcode', 500);
			$table->integer('VideoCategoryId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('videolists');
	}

}

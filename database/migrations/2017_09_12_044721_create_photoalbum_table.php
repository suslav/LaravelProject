<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotoalbumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photoalbum', function(Blueprint $table)
		{
			$table->integer('AlbumId', true);
			$table->string('Title', 50);
			$table->string('Description', 100);
			$table->string('AlbumUrl', 300);
			$table->string('AlbumThumbUrl', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photoalbum');
	}

}

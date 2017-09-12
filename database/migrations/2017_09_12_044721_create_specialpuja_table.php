<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialpujaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialpuja', function(Blueprint $table)
		{
			$table->integer('SpujaID', true);
			$table->string('SpujaTitle', 50);
			$table->string('SpujaDescription', 100);
			$table->string('SpujaImageUrl', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specialpuja');
	}

}

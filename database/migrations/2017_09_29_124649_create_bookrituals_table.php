<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookritualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookrituals', function (Blueprint $table) {
           $table->integer('BookritualID', true);
		   $table->string('Name', 100);
		   $table->string('Gotram', 100);
		    $table->string('Gender', 45);
			 $table->string('Address', 500);
			  $table->string('Mobile', 45);
			  $table->date('Date');
			  $table->integer('RitualID');
			  $table->integer('UserID');
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookrituals');
    }
}

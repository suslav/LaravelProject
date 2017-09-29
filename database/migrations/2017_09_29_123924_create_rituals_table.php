<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRitualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rituals', function (Blueprint $table) {
           $table->integer('RitualID', true);
		   $table->string('RitualName', 100);
		   $table->string('When', 45);
		   $table->integer('RitualCategoryID');
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
        Schema::drop('rituals');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::create('replys', function (Blueprint $table) {
       //     $table->increments('id');
       //     $table->timestamps();
       // });

	   Schema::create('replys', function(Blueprint $table)
		{
			$table->integer('ReplyID', true);
			$table->integer('UserID');
			$table->integer('VisitorFormID');
			$table->string('ReplyMessage', 500);
			$table->date('ReplyDate');

			//$table->timestamps();
			//$table->char('ApproveStatus');
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('replys');
    }
}

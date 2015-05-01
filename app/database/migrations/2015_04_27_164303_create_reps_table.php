<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reps', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name')->nullable();
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('zip')->nullable();
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reps');
	}

}

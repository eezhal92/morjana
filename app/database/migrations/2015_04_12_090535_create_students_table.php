<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('people_id');
            $table->string('student_number');
            $table->integer('univercity_id');
            $table->integer('major_id');
            $table->integer('degree_id');
            $table->integer('year', 4);
            $table->enum('status', ['active', 'not_active', 'graduated']);
            $table->enum('type', ['regular', 'non_regular']);
            $table->integer('amount_of_grant')->unsigned();
            $table->integer('father_id');
            $table->integer('mother_id');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('students');
	}

}

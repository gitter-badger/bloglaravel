<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function($table){
            $table->increments('id');
            $table->string('firstname');
            $table->string('email');
            $table->string('goal');
            $table->text('question');
            $table->date('date');
            $table->boolean('availability')->default(0);
            $table->text('text_response');
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
        Schema::drop('feedback');
    }

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function($table){
            $table->increments  ('id');
            $table->integer     ('category_id')->unsigned();
            $table->integer     ('post_author');
            $table->date        ('post_date');
            $table->text        ('post_content');
            $table->string      ('post_title');
            //$table->integer     ('post_status');
            //$table->integer     ('post_parent');
            $table->integer     ('comment_count');
            $table->text        ('keywords');
            $table->boolean     ('availability')->default(1); //будет ли доступный пост или нет
            $table->string      ('image');
            $table->timestamps();

            //$table->integer     ('category_id');
            //$table->foreign     ('category_id')->references('id')->on('categories');
            /*$table->integer     ('post_category');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }

}

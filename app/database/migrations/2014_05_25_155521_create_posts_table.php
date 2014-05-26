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
			$table->increments('id');
			$table->integer('post_author');
			$table->date('post_date');
			$table->text('post_content');
			$table->string('post_title');
			$table->integer('post_category');
			$table->integer('post_status');
			$table->integer('post_parent');
			$table->integer('comment_count');
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
		Schema::drop('posts');
	}

}

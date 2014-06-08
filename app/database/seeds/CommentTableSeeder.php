<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 08.06.14
 * Time: 15:45
 */
class CommentTableSeeder extends Seeder{

    public function run(){
        DB::table('comments')->delete();

        Comment::create(array(
            'author' => 'Vitalii',
            'text'   => 'look i am  a test this comment'
        ));

        Comment::create(array(
            'author' => 'Vadim',
            'text' => 'I am a master Laravel 4 and Argular'
        ));

    }



}






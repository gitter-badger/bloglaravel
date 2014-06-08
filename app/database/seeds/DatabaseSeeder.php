<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('UsersTableSeeder');// UsersTableSeeder - класс, через который будем загружать начальные данные
	     $this->call('CommentTableSeeder');
         $this->command->info('Comment table seeder');

    }

}

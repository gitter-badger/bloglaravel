<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 02.06.14
 * Time: 21:27
 */

class UsersTableSeeder  extends Seeder{
    /**
     * run() - загружаем начальные данные
     */
    public function run(){
            $user = new User;
            $user->firstname    = 'Vitalii';
            $user->lastname     = 'Sestrenskyi';
            $user->email        = 'sestrinskiy@mail.ru';
            $user->password     = Hash::make('cbyecrjcbyec1');
            $user->telephone    = '0679928178';
            $user->admin        = 1;
            $user->save();
    }

}
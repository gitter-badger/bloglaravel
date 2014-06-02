<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 02.06.14
 * Time: 21:46
 */
class UsersController extends BaseController{

    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    /**
     * getNewaccount() - метод загрузки страницы формы регистрации нового аккаунта
     * @return mixed
     */
    public function getNewaccount(){
        return View::make('users.newaccount');
    }

    /**
     * postCreate() - метод создания нового пользователя
     * @return mixed
     */
    public function postCreate(){
        $validator = Validator::make(Input::all(), User::$rules);

        if($validator->passes()){
            $user = new User;
            $user->firstname     = Input::get('firstname');
            $user->lastname      = Input::get('lastname');
            $user->telephone     = Input::get('telephone');
            $user->email         = Input::get('email');
            $user->password      = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('users/signin')
                            ->with('message', 'Спасибо за регистрацию на нашем сайте. Пожалуйста, войдите в свой аккаунт.');

        }else{
            return Redirect::to('users/newaccount')
                            ->with('message', 'Извините но при регистрации произошли ошибки')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    /**
     * getSignin() - метод загрузки страницы Входа в аккаунт пользователя
     * @return mixed
     */
    public function getSignin(){
        return View::make('users.signin');
    }

    /**
     * postSignin() - метод обработки страницы авторизации пользователя
     * @return mixed
     */
    public function postSignin(){
        if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password') ))){
            return Redirect::to('/')
                            ->with('message', 'Спасибо что авторизовались');
        }else{
            return Redirect::to('users/signin')
                            ->with('message', 'Ваш email/пароль некорректны');
        }
    }

    /**
     * getSignout() - метод загрузки страницы Выхода из учётной записи пользователя
     * @return mixed
     */
    public function getSignout(){
        Auth::logout();
        return Redirect::to('users/signin')
                        ->with('message', 'Вы вышли из учётной записи пользователя');
    }



}
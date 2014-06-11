<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 10.06.14
 * Time: 21:41
 */
class Feedback extends Eloquent{

    /**
     * @var array $fillable - массив защищенных полей
     */
    protected $fillable = array(
        'email',
        'firstname',
        'question'
    );

    /**
     * @var array $rules - правила валидацци данных
     */
    public static $rules = array(
        'email'     => 'required|email',
        'firstname' => 'required|min:3',
        'question'  => 'required|min:3'
    );



}
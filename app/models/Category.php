<?php

/**
 * Class Category
 */
class Category extends Eloquent{

    /**
     * $fillable -  массив защищенных полей
     * @var array
     */
    protected $fillable = array('name');

    /**
     * $rules - массив ограничений для ввода значений полей в форме
     * @var array
     */
    public static $rules = array('name'  => 'required|min:3');

    /**
     * posts() - метод для связи с таблицей заметок
     * @return mixed
     */
    public function posts(){
        return $this->hasMany('Posts');
    }

	
}



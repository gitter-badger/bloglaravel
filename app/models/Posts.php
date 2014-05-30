<?php

/**
 * Class Posts
 */
class Posts extends Eloquent{

    /**
     * $fillable - массив защищенных полей
     * @var array
     */
    protected $fillable = array('post_title',
								'post_author',
								'post_date',
								'post_content',
								'category_id',
                                'image',
                                'availability'
								);

    /**
     * $rules - массив ограничений для ввода значений полей в форме
     * @var array
     */
    public static $rules = array('post_title'  => 'required|min:3',
								'post_author'  => 'required|min:3',
								'post_content' => 'required|min:30',
								'category_id'  => 'required|min:1',
                                'availability' => 'integer',
                                'image'        =>' required|image|mimes:jpeg, jpg, bmp, png, gif'
								);


    /**
     * category() - метод для связи с таблицей категорий
     * @return mixed
     */
    public function category(){
        return $this->belongTo('Category');
    }


}

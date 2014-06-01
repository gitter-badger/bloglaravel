<?php

/**
 * Class CategoriesController - класс категории заметок
 */
class CategoriesController extends BaseController{

    /**
     * __construct() - конструктор , установили фильтр для защиты от нежелательных атак
     */
    public function __construct(){
        parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));

	}

    /**
     * getIndex() - метод загрузки страницы категорий
     * @return mixed
     */
    public function getIndex(){
		return View::make('categories.index')
					->with('categories', Category::all());
	}


    /**
     * postCreate() - метод создания новой категории
     * @return mixed
     */
    public function postCreate(){
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()){
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			return Redirect::to('admin/categories/index')
							->with('message', 'Категория была создана!!!');
		}

		return Redirect::to('admin/categories/index')
						->with('message', 'Что то пошло не так!!!')
						->withErrors($validator)
						->withInput();
	}


    /**
     * postDestroy() - метод удаления категории
     * @return mixed
     */
    public function postDestroy(){
		$category = Category::find(Input::get('id'));

		if ($category){
			$category->delete();
			return Redirect::to('admin/categories/index')
							->with('message', 'Категория была удалена!!!');
		}

		return Redirect::to('admin/categories/index')
						->with('message', 'Что то пошло не так, пожалуйста попробуйте снова!!!');
	}


}


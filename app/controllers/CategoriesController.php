<?php


class CategoriesController extends BaseController{
	
	public function __construct(){
		$this->beforeFilter('csrf', array('on'=>'post'));

	}


	public function getIndex(){
		return View::make('categories.index')
					->with('message', Category::all());
	}



	public function postCreate(){
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator){
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


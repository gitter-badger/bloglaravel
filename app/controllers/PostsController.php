<?php

class PostsController extends BaseController{

	public function __construct(){
		$this->beforeFilter('csrf', array('on'=>'post'));

	}


	public function getIndex(){
		return View::make('posts.index')
					->with('posts', Posts::all());
	}


	public function postCreate(){
		$validator = Validator::make(Input::all(), Posts::$rules);

		if($validator->passes()){
			$posts = new Posts;
			$posts->post_title    = Input::get('post_title');
			$posts->post_author   = Input::get('post_author');
			$posts->post_date     = Input::get('post_date');
			$posts->post_content  = Input::get('post_content');
			$posts->post_category = Input::get('post_category');
			$posts->post_status   = Input::get('post_status');
			$posts->post_parent   = Input::get('post_parent');
			$posts->comment_count = Input::get('comment_count');
			$posts->save();

			return Redorect::to('admin/posts/index')
							->with('Заметка была создана');
		}
		
		return Redirect::to('admin/posts/index')
							->with('message', 'Что то пошло не так. Заметка не была создана!!!')
							->withErrors($validator)
							->withInput();
		
	}


	public function postDestroy(){
		$posts = Posts::find(Input::get('id'));

		if($posts){
			$posts->delete();
			return Redirect::to('admin/posts/index')
							->with('message', 'Заметка была удалена!!!');
		}
		else{
			return Redirect::to('admin/posts/index')
							->with('message', 'Что то пошло не так. Попробуйте еще!!!');
		}

	}





}


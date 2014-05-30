<?php

/**
 * Class PostsController - - класс категории заметок
 */
class PostsController extends BaseController{

    /**
     * __construct() - конструктор , установили фильтр для защиты от нежелательных атак
     */
    public function __construct(){
		$this->beforeFilter('csrf', array('on'=>'post'));

	}

    /**
     * getIndex() - метод загрузки страницы заметок
     * @return mixed
     */
    public function getIndex(){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

		return View::make('posts.index')
					->with('posts', Posts::all())
                    ->with('categories', $categories);
	}

    /**
     * postCreate() - метод создания новой заметки
     * @return mixed
     */
    public function postCreate(){
		$validator = Validator::make(Input::all(), Posts::$rules);

		if($validator->passes()){
			$posts = new Posts;
			$posts->post_title    = Input::get('post_title');
			$posts->post_author   = Input::get('post_author');
			$posts->post_date     = date('Y-m-d:H:i:s');
			$posts->post_content  = Input::get('post_content');
			$posts->category_id   = Input::get('category_id');
            $posts->keywords      = Input::get('keywords');
                $image = Input::file('image');
                $filename = time('Y-m-d:H:i:s') . "-" . $image->getClientOriginalname();
                Image::make($image->getRealPath())->resize(468,249)->save('public/img/products/' . $filename);
            $posts->image = 'img/products/' . $filename;
			$posts->save();

			return Redirect::to('admin/posts/index')
							->with('message','Заметка была создана');
		}
		
		return Redirect::to('admin/posts/index')
							->with('message', 'Что то пошло не так. Заметка не была создана!!!')
							->withErrors($validator)
							->withInput();
	}

    /**
     * postDestroy() - метод удаления заметки
     * @return mixed
     */
    public function postDestroy(){
		$posts = Posts::find(Input::get('id'));

		if($posts){
            File::delete('public/' . $posts->image);
			$posts->delete();
			return Redirect::to('admin/posts/index')
							->with('message', 'Заметка была удалена!!!');
		}
		else{
			return Redirect::to('admin/posts/index')
							->with('message', 'Что то пошло не так. Попробуйте еще!!!');
		}
	}


    /**
     * ToggleAvailability() - метод публикации или не пуликации заметки
     * @return mixed
     */
    public function postToggleAvailability(){
        $post = Posts::find(Input::get('id'));

        if($post){
            $post->availability = Input::get('availability');
            $post->save();

            return Redirect::to('admin/posts/index')
                            ->with('message', 'Заметка была обновлена!!!');
        }

        return Redirect::to('admin/posts/index')
                        ->with('message', 'Обновления заметки не совершилось!!!');
    }

    /**
     * postEditPost() - редактирование заметки
     * @return mixed
     */
    public function postEditPost(){
        $categories = array();

        foreach(Category::all() as $category){
            $categories[$category->id] = $category->name;
        }

        $postdata = Posts::find(Input::get('id'));
        return View::make('posts.edit')
                        ->with('message','Изменения были сохранены успешно!!!')
                        ->with('categories', $categories)
                        ->with('postdata', $postdata);



        $validator = Validator::make(Input::all(), Posts::$rules);

        if($validator->passes()){
            $postdata->post_title    = Input::get('post_title');
            $postdata->post_author   = Input::get('post_author');
            $postdata->post_date     = date('Y-m-d:H:i:s');
            $postdata->post_content  = Input::get('post_content');
            $postdata->category_id   = Input::get('category_id');
            $postdata->keywords      = Input::get('keywords');
            $image = Input::file('image');
            $filename = time('Y-m-d:H:i:s') . "-" . $image->getClientOriginalname();
            Image::make($image->getRealPath())->resize(468,249)->save('public/img/products/' . $filename);
            $postdata->image = 'img/products/' . $filename;
            $postdata->save();

            return Redirect::to('admin/posts/index')
                ->with('message','Заметка была отредактирована');
        }

        return Redirect::to('admin/posts/index')
            ->with('message', 'Редактирование заметки заметки завершилось неудачей. Исправте ошибки!!!')
            ->withErrors($validator)
            ->withInput();




    }



}


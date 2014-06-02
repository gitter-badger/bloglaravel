<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 01.06.14
 * Time: 18:49
 */
 class StartController extends BaseController{

     public function __construct(){
         parent::__construct();
         $this->beforeFilter('csrf', array('on' => 'post'));
     }

     /**
      * getIndex() - отображения главной страницы
      * @return mixed
      */
     public function getIndex(){
         return View::make('start.index')
                    ->with('posts', Posts::take(3)->where('availability', '=', '1')->orderBy('created_at', 'DESC')->get());
     }

     /**
      *getView($id) - отображения страницы конкретной заметки
      * @param $id
      * @return mixed
      */
     public function getView($id){
         return View::make('start.view')
                    ->with('post', Posts::find($id));
     }

     /**
      * getCategory($cat_id) - отображения страницы заметок по категориям
      * @param $cat_id
      * @return mixed
      */
     public function getCategory($cat_id){
        return View::make('start.category')
                    ->with('posts', Posts::where('category_id', '=', $cat_id)->paginate(3))
                    ->with('category', Category::find($cat_id));
     }

     /**
      * getSearch() - поиск по сайту
      * @return mixed
      */
     public function getSearch(){
         $keyword = Input::get('keyword');
         $searchResult = Posts::where('post_title', 'LIKE', '%'.$keyword.'%')->get();

         if(empty($keyword)){
             return View::make('start.search')
                 ->with('posts', $searchResult)
                 ->with('keyword', $keyword)
                 ->with('emptyResult', 'Введите ключевое слово для поиска...');
         }
         else{
             if($searchResult->isEmpty()){
                 return View::make('start.search')
                     ->with('posts', $searchResult)
                     ->with('keyword', $keyword)
                     ->with('emptyResult', 'К сожалению по данному запросу ничего не найдено...');
             }else{
                 return View::make('start.search')
                     ->with('posts', $searchResult)
                     ->with('keyword', $keyword)
                     ->with('emptyResult', '');
             }
         }

     }






 }
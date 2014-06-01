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








 }
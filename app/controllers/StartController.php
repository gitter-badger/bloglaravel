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
         $searchResult = Posts::where('post_title', 'LIKE', '%'.$keyword.'%')->paginate(3);

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

     /**
      * getContact() - метод отбражения страницы -  О нас
      * @return mixed
      */
     public function getAbout(){
         return View::make('start.about');
     }

     /**
      * @return mixed getIndex() - метод отображения страницы обратной связи
      */
     public function getFeedback(){
         return View::make('start.feedback');
     }


     /**
      * @return mixed postCreateFeedback() - метод создания нового feedback сообщения
      */
     public function postCreateFeedback(){
         $validator = Validator::make(Input::all(), Feedback::$rules);

         if($validator->passes()){
             $feedback = new Feedback;
             $feedback->firstname = Input::get('firstname');
             $feedback->email     = Input::get('email');
             $feedback->goal      = Input::get('goal');
             $feedback->question  = Input::get('question');
             $feedback->date      = date('Y-m-d:H:i:s');
             $feedback->save();

             return Redirect::to('/')
                 ->with('message', 'Ваше обращение отправлено и будет рассмотрено в ближайшее время. Об это Вы будите оповещены по электронной почте.');

         }else{

             return Redirect::to('start/feedback')
                 ->with('message', 'Что то пошло не так. Ваше обращения не было отправлено!!!')
                 ->withErrors($validator)
                 ->withInput();
         }
     }






 }
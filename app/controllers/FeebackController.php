<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 10.06.14
 * Time: 21:53
 */
class FeedbackController extends BaseController{

    /**
     * __construct() -  конструктор , установили фильтр для защиты от нежелательных атак + фильтр для админки
     */
    public function __construct(){
        parent::__construct();
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('admin'); // только админ сможет иметь доступ до всеш методов этого контроллера
    }

    /**
     * @return mixed getIndex() - метод отображения страницы админки feedback
     */
    public function getIndex(){
        $feedbacks = Feedback::all();

        return View::make('feedback.index')
                    ->with('feedbacks', $feedbacks);
    }

    /**
     * @return mixed postAvailabilityFeedback() - метод публикации ответа на  Feedback
     */
    public function postAvailabilityFeedback(){
        $feedback = Feedback::find(Input::get('id'));

        if($feedback){
            $feedback->availability = Input::get('availability');
            $feedback->save();

            return Redirect::to('admin/feedback/index')
                            ->with('message', 'Сообщения обратной связи было обновлено!!!');
        }else{
            return Redirect::to('admin/feedback/index')
                            ->with('message', 'Что то пошло не так попробуйте снова!!!');
        }
    }


    /**
     * @return mixed postDestroy() - метод удаления Feedback()
     */
    public function postDestroy(){
        $feedback = Feedback::find(Input::get('id'));

        if($feedback){
            $feedback->delete();

            return Redirect::to('admin/feedback/index')
                            ->with('message', 'Feedback был удален!!!');
        }
        else{
            return Redirect::to('admin/feedback/index')
                            ->with('message', 'Что то пошло не так попробуйте еще раз!!!');
        }
    }

    /**
     * @return mixed getResponseFeedback() - метод отображения контретных данных сообщения Feedback
     */
    public function getResponseFeedback(){
        $feedback = Feedback::find(Input::get('id'));

        return View::make('feedback.view')
                    ->with('feedback', $feedback);

    }


    /**
     * @return mixed postResponseFeedback() - метод обработки конкретного feedback и отправки письма с ответом пользователю
     */
    public function postResponseFeedback(){
        $id = Input::get('id');
        $validator = Validator::make(Input::all(), Feedback::$rules);

        if($validator->passes()){
            DB::table('feedbacks')
                    ->where('id', '=', $id)
                    ->update(array(
                        'firstname'     => Input::get('firstname'),
                        'email'         => Input::get('email'),
                        'goal'          => Input::get('goal'),
                        'question'      => Input::get('question'),
                        'date'          => date('Y-m-d:H:i:s'),
                        'text_response' => Input::get('text_response')
                    ));

            //отправка email

            $user = array(
                'adminEmail'        => 'sestrinskiy@mail.ru',
                'adminName'         => 'Vitalii',
                'customerEmail'     => Input::get('email'),
                'customerFirstname' => Input::get('firstname')
            );

            $data = array(
                'firstname'     => Input::get('firstname'),
                'email'         => Input::get('email'),
                'goal'          => Input::get('goal'),
                'question'      => Input::get('question'),
                'date'          => date('Y-m-d:H:i:s'),
                'text_response' => Input::get('text_response'),
                'adminName'     => $user['adminName'],
                'adminEmail'    => $user['sestrinskiy@mail.ru']
            );

            Mail::send('emails.feedback', $data, function($message) use ($user){
                $message->from($user['sestrinskiy@mail.ru'], $user['adminName']);
                $message->to($user['customerEmail'], $user['customerFirstname'])
                        ->subject('Спасибо за Ваш вопрос');
            });


            return Redirect::to('admin/feedback/index')
                            ->with('message', 'Feedback был обработал успешно и письмо было отправлено пользователю!!!');

        }else{
            return Redirect::to('admin/feedback/view')
                            ->with('message', 'Что то пошло не так попробуйте еще раз!!!')
                            ->withErrors($validator)
                            ->withInput();
        }
    }





}
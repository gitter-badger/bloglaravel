@extends('layouts.main')


@section('content')


<div id="admin">
    <h2>Обработка сообщения обратной связи</h2>
    <hr />
    <p>Сдесь Вы можите ответить на сообщения обратной связи</p> <hr/>

    @if($errors->has())
    <div id="form-errors">
        <p>Были следущие ошибки:</p>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><!-- end form-errors -->
    @endif


    {{ Form::open(array('url'=>'admin/feedback/response-feedback')) }}

    <p>
        {{ Form::label('firstname' ,'Ваше имя') }}
        {{ Form::text('firstname', $feedback->firstname) }}
    </p>
    <p>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $feedback->email) }}
    </p>
    <p>
        {{ Form::label('goal', 'Цель') }}
        {{ Form::text('goal', $feedback->goal) }}
    </p>
    <p>
        {{ Form::label('question', 'Вопрос') }}
        {{ Form::textarea('question', $feedback->question) }}
    </p>
    <p>
        {{ Form::label('text_response', 'Ответ') }}
        {{ Form::textarea('text_response') }}
    </p>

    {{ Form::hidden('id', $feedback->id) }}
    {{ Form::submit('Обработать сообщения', array('class'=> 'btn btn-inverse')) }}
    {{ Form::close() }}

</div> <!-- end admin -->




@stop

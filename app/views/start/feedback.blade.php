@extends('layouts.main')

@section('content')



<div id="contact-info">
    <h2>Форма обратной связи</h2>
    <hr>
        <h5>
            С помощью данной формы Вы можете задать интересующей  Вас вопрос и  в ближайшие время руководство сайта ответит Вам.
        </h5>
    <hr>


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


    {{ Form::open(array('url'=>'start/create-feedback')) }}
    <p>
        {{ Form::label('firstname' ,'Ваше имя') }}
        {{ Form::text('firstname') }}
    </p>
    <p>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}
    </p>
    <p>
        {{ Form::label('goal', 'Цель') }}
        {{ Form::text('goal') }}
    </p>
    <p>
        {{ Form::label('question', 'Вопрос') }}
        {{ Form::textarea('question') }}
    </p>
    <br>
    <p>
        {{ Form::submit('Отправить', array('class'=> 'btn btn-primary')) }}
    </p>
    {{ Form::close() }}


</div>



@stop
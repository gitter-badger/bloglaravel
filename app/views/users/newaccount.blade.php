@extends('layouts.main')

@section('content')

    <div id="new-account">
        <h1>Создание учетной записи</h1>

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

        {{ Form::open(array('url' => 'users/create')) }}
            <p>
                {{ Form::label('Имя') }}
                {{ Form::text('firstname') }}
            </p>
            <p>
                {{ Form::label('Фамилия') }}
                {{ Form::text('lastname') }}
            </p>
            <p>
                {{ Form::label('email') }}
                {{ Form::text('email') }}
            </p>
            <p>
                {{ Form::label('Пароль') }}
                {{ Form::password('password') }}
            </p>
            <p>
                {{ Form::label('Подтвердите пароль') }}
                {{ Form::password('password_confirmation') }}
            </p>
            <p>
                {{ Form::label('Телефон') }}
                {{ Form::text('telephone') }}
            </p>
        {{ Form::submit('Создать новый аккаунт', array('class' => 'secondary-btn')) }}
        {{ Form::close() }}
    </div><!-- end new-account -->

@stop














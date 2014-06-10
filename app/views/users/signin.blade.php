@extends('layouts.main')

@section('content')

     <div id="sign-form">
            <section id="signin-form">

                {{ Form::open(array('url' => 'users/signin' )) }}
                    <p>
                        {{ Form::label('Введите email') }}<br>
                        {{ HTML::image('img/email.gif', 'Email Address') }}
                        {{ Form::text('email') }}
                    </p>
                    <p>
                        {{ Form::label('Введите пароль') }}<br>
                        {{ HTML::image('img/password.gif', 'Password') }}
                        {{ Form::password('password') }}
                    </p>

                {{ Form::submit('Вход', array('type' => 'submit' , 'class' => 'btn btn-primary') ) }}
                {{ Form::close() }}
            </section>
            <section id="signup">
                <h3>
                    Вы можите создать новый аккаунт выполнив всего несколько шагов.<br>
                    Пепейдите по ссылке ниже.
                </h3>
                {{ HTML::link('users/newaccount', 'Создать новый аккаунт', array('class' => 'secondary-btn') ) }}
            </section><!-- end signup -->

    </div><!-- end sign-form -->
@stop
@extends('layouts.main')


@section('content')

<div id="admin">
    <h1>Административная панель заметок</h1>
    <hr />
    <p>Сдесь Вы можите смотреть, удалять и создавать новых заметок</p>

    <h2>Заметки</h2><hr/>

    <ul>
        @foreach($posts as $post)
        <li>
            {{ HTML::image($post->image, $post->post_title , array('width' => '50')) }}
            {{ $post->post_title }} -
            {{ Form::open(array('url' => 'admin/posts/destroy', 'class' => 'form-inline')) }}
            {{ Form::hidden('id', $post->id) }}
            {{ Form::submit('Удалить') }}
            {{ Form::close() }} -


            {{ Form::open(array('url' => 'admin/posts/toggle-availability', 'class' => 'form-inline' )) }}
            {{ Form::hidden('id', $post->id) }}
            {{ Form::select('availability', array('1' => 'Опубликовано'), '0' => 'Не опубликовано'), $post->availability }}
            {{ Form::submit('Обновить') }}
            {{ Form::close() }}

        </li>
        @endforeach
    </ul>



    <h2>Создать новую заметку</h2>
    <hr/>

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





    {{ Form::open(array('url'=>'admin/posts/create')) }}
    <p>
        {{ Form::label('Названия категории') }}
        {{ Form::text('name') }}
    </p>
    {{ Form::submit('Создать заметку', array('class'=> 'secondary-btn')) }}
    {{ Form::close() }}




    $posts->post_title    = Input::get('post_title');
    $posts->post_author   = Input::get('post_author');
    $posts->post_date     = date('Y-m-d:H:i:s');
    $posts->post_content  = Input::get('post_content');
    $posts->category_id   = Input::get('category_id');
    $posts->comment_count = Input::get('comment_count');
    $posts->keywords      = Input::get('keywords');











</div> <!-- end admin -->




@stop










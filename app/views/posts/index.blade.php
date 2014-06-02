@extends('layouts.main')


@section('content')

<div id="admin">
    <h1>Административная панель заметок</h1>
    <hr />
    <p>Сдесь Вы можите смотреть, удалять и создавать новые заметоки</p>

    <h2>Заметки</h2><hr/>

    <ul>
        @foreach($posts as $post)
        <li>
            {{ HTML::image($post->image, $post->post_title , array('width' => '50')) }}
            {{ $post->post_title }} -
            {{ Form::open(array('url' => 'admin/posts/destroy', 'class' => 'form-inline')) }}
            {{ Form::hidden('id', $post->id) }}
            {{ Form::submit('Удалить') }}
            {{ Form::close() }}
            <br/>
            <br>

            {{ Form::open(array('url' => 'admin/posts/toggle-availability', 'class' => 'form-inline' )) }}
            {{ Form::hidden('id', $post->id) }}
            {{ Form::select('availability', array('0' => 'Не опубликовано', '1' => 'Опубликовано' ), $post->availability) }}
            {{ Form::submit('Обновить') }}
            {{ Form::close() }}


            {{ Form::open(array('url' => 'admin/posts/edit-post', 'class' => 'form-inline' )) }}
            {{ Form::hidden('id', $post->id) }}
            {{ Form::submit('Редактировать') }}
            {{ Form::close() }}
            <br/>
            <hr/>

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



    {{ Form::open(array('url'=>'admin/posts/create', 'files' => true)) }}
    <p>
        {{ Form::label('category_id' ,'Категория') }}
        {{ Form::select('category_id', $categories) }}
    </p>
    <p>
        {{ Form::label('Названия') }}
        {{ Form::text('post_title') }}
    </p>
    <p>
        {{ Form::label('Описания') }}
        {{ Form::textarea('post_content') }}
    </p>

    <p>
        {{ Form::label('Автор') }}
        {{ Form::text('post_author') }}
    </p>
    <p>
        {{ Form::label('Ключевые слова') }}
        {{ Form::text('keywords') }}
    </p>
    <p>
        {{ Form::label('image', 'Выберите картинку для заметки') }}
        {{ Form::file('image') }}
    </p>


    {{ Form::submit('Создать заметку', array('class'=> 'secondary-btn')) }}
    {{ Form::close() }}

</div> <!-- end admin -->


@stop










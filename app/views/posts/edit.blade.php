@extends('layouts.main')

@section('content')

<div id="admin">
    <h2>Редактирование текущий заметки</h2>
    <hr />
    <p>Сдесь Вы можите отредактировать любую Вашу заметоку</p> <hr/>

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


    {{ Form::open(array('url'=>'admin/posts/update-post', 'files' => true)) }}
    <p>
        {{ Form::label('category_id' ,'Категория') }}
        {{ Form::select('category_id', $categories, $postdata->category_id) }}
    </p>
    <p>
        {{ Form::label('Названия') }}
        {{ Form::text('post_title', $postdata->post_title) }}
    </p>
    <p>
        {{ Form::label('Описания') }}
        {{ Form::textarea('post_content', $postdata->post_content) }}
    </p>

    <p>
        {{ Form::label('Автор') }}
        {{ Form::text('post_author', $postdata->post_author) }}
    </p>
    <p>
        {{ Form::label('Ключевые слова') }}
        {{ Form::text('keywords', $postdata->keywords) }}
    </p>
    <p>
        {{ Form::label('image', 'Выберите картинку для заметки') }}
        {{ Form::file('image') }}
    </p>
    {{ Form::hidden('id', $postdata->id) }}
    {{ Form::submit('Обновить изменения', array('class'=> 'secondary-btn')) }}
    {{ Form::close() }}

</div> <!-- end admin -->


@stop
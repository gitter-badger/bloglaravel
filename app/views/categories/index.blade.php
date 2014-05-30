@extends('layouts.main')


@section('content')

	<div id="admin">
		<h1>Административная панель категорий</h1>
		<hr />
		<p>Сдесь Вы можите смотреть, удалять и создавать новые категории</p>

		<h2>Категории</h2><hr/>

		<ul>
			@foreach($categories as $category)	
				<li>
					{{ $category->name }} - 
					{{ Form::open(array('url' => 'admin/categories/destroy', 'class' => 'form-inline')) }}
					{{ Form::hidden('id', $category->id) }}
					{{ Form::submit('Удалить') }}
					{{ Form::close() }}
				</li>
			@endforeach
		</ul>


        <h2>Создать новую категорию</h2>
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

        {{ Form::open(array('url'=>'admin/categories/create')) }}
        <p>
            {{ Form::label('Названия категории') }}
            {{ Form::text('name') }}
        </p>
        {{ Form::submit('Создать категорию', array('class'=> 'secondary-btn')) }}
        {{ Form::close() }}

    </div> <!-- end admin -->




@stop










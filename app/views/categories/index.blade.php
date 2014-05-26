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
					{{ Form::hidden('id', $post->id) }}
					{{ Form::submit('Удалить') }}
					{{ Form::close() }}
				</li>
			@endforeach
		</ul>
	</div> <!-- end admin -->

	<h2>Создать новую категорию</h2>
	<hr/>

	@if($errors->has())
		<div id="form-errors">
			<p>Были следущие ошибки:</p>
			<ul>
				@foreach($erros->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>	
		</div><!-- end form-errors -->
	@endif

	{{ Form::open(array('url'=>'admin/categories/create')) }}
		<p>
			{{ Form::label('post_title') }}
			{{ Form::text('post_title') }}
		</p>
		<p>
			{{ Form::label('post_author') }}
			{{ Form::text('post_author') }}
		</p>
		<p>
			{{ Form::label('post_date') }}
			{{ Form::text('post_date') }}
		</p>
		<p>
			{{ Form::label('post_content') }}
			{{ Form::text('post_content') }}
		</p>
		<p>
			{{ Form::label('post_category') }}
			{{ Form::text('post_category') }}
		</p>
		<p>
			{{ Form::label('post_status') }}
			{{ Form::text('post_status') }}
		</p>
		<p>
			{{ Form::label('post_parent') }}
			{{ Form::text('post_parent') }}
		</p>
		<p>
			{{ Form::label('comment_count') }}
			{{ Form::text('comment_count') }}
		</p>



	{{ Form::submit('Создать категорию', array('class'=> 'secondary-cart-btn')) }}
	{{ Form::close() }}





@stop










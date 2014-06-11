@extends('layouts.main')


@section('content')


<div id="admin">
    <h1>Административная панель сообщений обратной связи</h1>
    <hr />
    <p>Сдесь Вы можите смотреть, удалять и создавать новые сообщения обратной связи</p>
    <br>

    <h2>Сообщения(Feedback)</h2><hr/>

    <table class="table table-bordered">
        <tbody>
        @foreach($feedbacks as $feedback)

            <tr>
                <td>
                    {{ $feedback->goal }}
                </td>
                <td>
                    {{ Form::open(array('url' => 'admin/feedback/destroy', 'class' => 'btn-danger btn ')) }}
                    {{ Form::hidden('id', $feedback->id) }}
                    {{ Form::submit('Удалить') }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open(array('url' => 'admin/feedback/availability-feedback', 'class' => 'btn btn-primary' )) }}
                    {{ Form::hidden('id', $feedback->id) }}
                    {{ Form::select('availability', array('0' => 'Не обработано', '1' => 'Обработано' ), $feedback->availability) }}
                    {{ Form::submit('Обновить') }}
                    {{ Form::close() }}
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>



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


</div> <!-- end admin -->




@stop



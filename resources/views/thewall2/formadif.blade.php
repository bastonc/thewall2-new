@extends('thewall2.generalay')

@section ('title')
Загрузка ADIF отчета :: The Wall | Diplom
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <center>
            <h2>Загрузка отчета ADIF</h2>
            <p>Пожалуйста будте внимательны. Загружайте только файл в формате ADIF</p>
            <p>Log должен вестись под позывным СПС. Т.к. в журнал добавялется связь соискателя с
                тем кто помечен полем OPERATOR в файле ADIF</p>

                {{ Form::open(array('url' => action('uploadadifController@upload'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) }}

            <div class="form-group">

                &nbsp;{{ Form::file('upfile') }}
                {{Form::hidden('Token', $token)}}

            </div>

            <div class="form-group">


                    <button type="submit" class="btn btn-primary submit-button">Добавить</button>

                {{ Form::close() }}

            </center>



        </div>
    </div>
@stop
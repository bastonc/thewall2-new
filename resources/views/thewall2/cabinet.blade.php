@extends('thewall2.generalay')

@section ('title')
    Кабинет - дипломные программы :: The Wall
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
            <center>
            <h2>Ваші дипломні програми</h2>
                <a href="/newprogramm">Створити нову програму</a>
            </center>





        </div>


    </div>

    <center>
        <table border="0">
            @foreach($getList as $list)
                @if($list->status == "close")
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"></td></tr>
                    <tr><td rowspan="4"><img src="{{$list->image}}" width="100" heihgt="100"></td>
                        <td width="450" align="center" bgcolor="#bababf"><strong><font color="#7f7f8f">{{$list->name}}</font></strong></td><td  bgcolor="#bababf">&nbsp;&nbsp; </td><td  bgcolor="#bababf">&nbsp;&nbsp; </td></tr>
                <tr><td width="450" align="center"  bgcolor="#bababf" rowspan="3">{{$list->description}}</td><td  bgcolor="#bababf">&nbsp;&nbsp; </td><td  bgcolor="#bababf">&nbsp;&nbsp; </td></tr>
                <tr><td width="150" align="center" bgcolor="#f5f5dc" height="10">Редагувати</td><td width="150" align="center" bgcolor="#f5f5dc" height="10"><a href="/log?t={{$list->token}}">Log</a></td></tr>
                <tr><td width="150" align="center" bgcolor="#90ee90" height="10"><a href="/open?t={{$list->token}}">Відновити</a></td><td width="150" align="center" bgcolor="#f08080" height="10"><a href="/del?t={{$list->token}}">Видалити</a></td></tr>
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"> </td></tr>
                @elseif($list->status == "open")
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"></td></tr>
                    <tr><td rowspan="4"><img src="{{$list->image}}" width="100" heihgt="100"></td>
                        <td width="450" align="center"  bgcolor="#b0c4de"><strong>{{$list->name}}</strong></td><td bgcolor="#b0c4de"> &nbsp;&nbsp;</td><td bgcolor="#b0c4de">&nbsp;&nbsp; </td></tr>
                    <tr><td width="450" align="center"  bgcolor="#b0c4de" rowspan="3">{{$list->description}}</td><td bgcolor="#b0c4de">&nbsp;&nbsp; </td><td bgcolor="#b0c4de">&nbsp;&nbsp; </td></tr>
                    <tr><td width="150" align="center"  bgcolor="#f5f5dc" height="10" ><a href="/edit?t={{$list->token}}" >Редагувати</a></td><td width="150" align="center"  bgcolor="#f5f5dc" height="10"><a href="/log?t={{$list->token}}">Log/Додати ADIF</a></td></tr>
                    <tr><td width="150" align="center" bgcolor="#f0e68c" height="10" ><a href="/close?t={{$list->token}}">Завершити</a></td><td width="150" align="center" bgcolor="#f08080" height="10"><a href="/del?t={{$list->token}}">Видалити</a></td></tr>
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"> </td></tr>
                @elseif($list->status == "new")
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"></td></tr>
                    <tr><td rowspan="2"><img src="{{$list->image}}" width="100" heihgt="100"></td>
                        <td width="450" align="center">{{$list->name}}</td><td width="150" align="center"><a href="/edit?t={{$list->token}}">Редагувати</a></td><td width="150" align="center">Log/Додати ADIF</td></tr>
                    <tr><td width="450" align="center">{{$list->description}}</td><td width="150" align="center"><a href="/open?t={{$list->token}}">Запустити програму</a></td><td width="150" align="center" bgcolor="#b22222"><a href="/del?t={{$list->token}}">Видалити</a></td></tr>
                    <tr><td colspan="4" bgcolor="#32cd32" height="1"></td></tr>
                @endif
            @endforeach
            <tr>
        </table>
    </center>

@stop
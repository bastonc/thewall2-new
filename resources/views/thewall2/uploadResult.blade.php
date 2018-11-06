@extends('thewall2.generalay')

@section ('title')
    Загрузка ADIF отчета :: The Wall | Diplom
@stop

@section('content')
    <div class="jumbotron">
        <div class="container">
           <center> <h2>Отчет ADIF загружен</h2>
            <p>Спасибо за Ваше уважение к коллегам</p>
            <p>Ниже приведены добавленные записи</p>
           </center>


        </div>
    </div>
    <center>
    <table><tr bgcolor="#5f9ea0"><td align="center">CALL</td><td align="center">DATE</td><td align="center">TIME</td><td align="center">BAND</td><td align="center">FREQ</td><td align="center">TO STATION</td><td align="center">RS(t)</td></tr>
    @for ($index=0; $index<count($arrayRecord); $index++)
            <?php $res=$arrayRecord[$index]; ?>

                <tr><td> {{ $res['call']}}</td><td>{{$res['qso_date']}}</td><td>{{ $res['time_on']}}</td>
                      <td>{{$res['band']}}</td><td>{{$res['freq']}}</td><td> {{$res['operator']}}</td><td>{{ $res['rst_sent']}}</td></tr>

    @endfor
    </table>
    </center>
@stop
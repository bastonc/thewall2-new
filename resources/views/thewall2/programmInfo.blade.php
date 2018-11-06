@extends('thewall2.programmlay')

@section ('title')

    Дипломная программа {{$programmName}} :: The Wall | Diplom


@stop

@section('content')
    <div id="band" class="container text-center">
    <div id="band" class="container text-center">
                <h2>{{$programmName}}</h2>
    </div>


        {{ Form::open(array('url' => action('frontend@searchCall'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            Введіть Ваш позивний:
            &nbsp;{{ Form::text('searchcall') }}
            {{Form::hidden('Token', $token=$programmInfo[0]->token)}}
            <button type="submit" class="btn btn-primary submit-button">Переглянути статистику</button>

            {{ Form::close() }}
        </div>
        <div class="row">


            <ul class="list-group ">

                <li class="list-group-item">
                    @foreach($programmInfo as $programm)
                        <div class="row" >
                            <div class="col-md-4 center-block text-center " style="align-content: center">
                                <img src="{{$programm->image}}" width="100%">
                                <br />
                                <br />
                                <table border="1" style=" border-color: #fff; color:#101010">
                                    <tr><td align="center" style="background-color:#a4aaae; width: 87%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;СПС&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td align="center" style="background-color:#a4aaae" >&nbsp;&nbsp;&nbsp;Бали&nbsp;&nbsp;&nbsp;</td></tr>
                                    @foreach($spsMember as $sps)
                                        <tr style="background-color:#e8eeee"><td align="left" >&nbsp;{{$sps->call}}&nbsp;</td><td align="right">&nbsp;{{$sps->score}}&nbsp;</td></tr>


                                    @endforeach
                                </table>


                            </div>
                            <div class="col ">

                                <div class="row-md-8 text-justify" style="padding: 10px">
                                    {{$programm->description}}



                                </div>
                            </div>





                        </div>
                    @endforeach
                </li>
            </ul>

        <!--table border="0">
            @foreach($programmInfo as $programm)
                <tr><td colspan="3" bgcolor="#32cd32" height="1"></td></tr>
                <tr><td rowspan="2"><img src="{{$programm->image}}" width="500"></td>
                    <td width="450" align="center" bgcolor="#bababf"><strong><font color="#7f7f8f">{{$programm->name}}</font></strong></td><td  bgcolor="#bababf">&nbsp;&nbsp; </td></tr>
                <tr><td width="450" align="center"  bgcolor="#bababf" colspan="2">{{$programm->description}}</td></tr>



            @endforeach

        </table-->


    </div>
@stop
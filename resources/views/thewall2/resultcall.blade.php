@extends('thewall2.programmlay')

@section ('title')
    Результати пошуку в програмі {{$programmName}} для {{$call}} :: The Wall | Diplom
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
            {{Form::hidden('Token', $tokenProgramm)}}
            <button type="submit" class="btn btn-primary submit-button">Переглянути статистику</button>

            {{ Form::close() }}
        </div>

        <ul class="list-group ">

            <li class="list-group-item">
                @foreach($programmInfo as $programm)
                    <div class="row" >
                        <div class="col-md-4 center-block " >
                            <img src="{{$programm->image}}" width="80%">
                        </div>
                        <div class="col ">
                            <p class="text-center"><a href="/programm/?p={{$programm->token}}">{{$programm->name}}</a></p>
                            <div class="body-layout">
                                <div class="wrap">
                                    <div id="short_text" class="text-description-content box-hide">
                            <div class="row-md-8 text-justify" style="padding: 10px; width: 100%">
                                {{$programm->description}}
                                    </div>
                                   </div>
                                    <!--a href="#" id="short_text_show_link" class="novisited arrow-link text-description-more-link">
                                        <span class="xhr arrow-link-inner">Читать полностью</span>&nbsp;→
                                    </a-->
                            </div>
                         </div>
                        </div>
                    </div>
                @endforeach
            </li>
        </ul>

        <!--div id="tour" class="bg-1 text-center"-->
        <div class="container text-center ">
          @if($searchCallInProgramm!=NULL)

                <p>Результати пошуку для {{$call}}</p>

            <ul class="list-group ">
                <li class="list-group-item">
                    <div class="row text-center text-uppercase" style="background: #003b4d; color: #cacaca">
                        <p>Всього балів: {{$totalScore}}</p>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row" style="background: #003b4d; color: #cacaca">
                        <div class="col-md-2 center-block ">
                            OPERATOR
                        </div>
                        <div class="col-md-2 center-block ">
                            CALL
                        </div>
                        <div class="col-md-2 center-block ">
                            RS(T)
                        </div>
                        <div class="col-md-2 center-block ">
                            BAND
                        </div>
                        <div class="col-md-2 center-block ">
                            DATE
                        </div>
                        <div class="col-md-2 center-block ">
                            SCORE
                        </div>
                    </div>
                    @foreach($searchCallInProgramm as $qsoinfo)


                        <div class="row">
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->call}}
                            </div>
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->operator}}
                            </div>
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->rst_sent}}
                            </div>
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->band}}
                            </div>
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->qso_date}}
                            </div>
                            <div class="col-md-2 center-block ">
                                {{$qsoinfo->score}}
                            </div>
                        </div>


                    @endforeach

                </li>
                <li class="list-group-item">
                    <div class="row text-center text-uppercase" style="background: #003b4d; color: #cacaca">
                        <p>Всього балів: {{$totalScore}}</p>
                    </div>
                </li>

            </ul>
                @else
                @if($call!="")
                <p>Для {{$call}} не знайдено QSO<br>Можливо станції що беруть участь у дипломній програмі ще не завантажили файли логу. <br> Спробуйте виповнити пошук пізніше</p>
                @else
                    <p>Здається Ви не ввели позивний</p>
                @endif

          @endif
        </div>




@stop
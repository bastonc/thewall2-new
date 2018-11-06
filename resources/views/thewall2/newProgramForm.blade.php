@extends('thewall2.generalay')

@section ('title')
    Створення нової дипломної програми :: The Wall | Diplom
@stop

@section('content')


            <script>
                var n=1;


                document.getElementById('divhidden').innerHTML='<input type=hidden id=\"id'+n+'\" name=\"index_sps\" value=\"0\" >';
                function plus(){
                    document.getElementById('divf'+n).innerHTML+='<br>'+n+' СПС: <input type=text id=\"id'+n+'\" name=\"sps_call_'+n+'\" size=\"10\"> баллов: <input type=text id=\"id'+n+'\" name=\"sps_score_'+n+'\" size=\"3\"> Пароль: <input type=text id=\"id'+n+'\" name=\"password_'+n+'\" size=\"3\"><input type=\"button\" id=\"id'+n+'\" onclick=del(id'+n+'); value=\"-\"> <div id=divf'+(n+1)+'></div>';
                    document.getElementById('divhidden').innerHTML='<input type=hidden id=\"id'+n+'\" name=\"index_sps\" value=\"'+n+'\">';
                    n++;

                }

                function del(id){
                    document.getElementById(id).remove();


                }
            </script>
            <div id="band" class="container text-center">
        {!!  Form::open(array('url' => 'newprogramm', 'files'=>true)) !!}
        <table border="0">



               <tr><td align="right"> Назва програми:&nbsp;&nbsp; </td> <td> <input type="text" name="Name" size="70"></td></tr>
                <tr><td align="right"> Опис:&nbsp;&nbsp; </td> <td> {{Form::textarea('Description', 'Опис програми буде відображатись на головній сторінці',array('size' => '69x10')  )}}</td></tr>
                <tr><td align="right"> Повтори:&nbsp;&nbsp;<br></td> <td align="left"> {{Form::select('Repeat', array('0' => 'Заборонені', '1' => 'На різних діапазонах', '2'=>'Дозволені будь де'), '1')}}</td></tr>
                <tr><td align="right"> Необхідно набрати балів:&nbsp;&nbsp; </td> <td align="left">{{ Form::text('ScoreFinal', '',array('size' => '4') )}}</td></tr>
                <tr><td align="right"> бали за умовчуванням:&nbsp;&nbsp; </td> <td align="left"> {{Form::text('ScoreDefault', '',array('size' => '4') )}}</td></tr>
                <tr><td align="right"> Зображення диплому:&nbsp;&nbsp; </td> <td> {{Form::file('Image')}} </td></tr>

    <tr><td colspan="2"> <font size="2"><em>УВАГА! Додавайте СПС та призначайте для кожного пароль. <br>Надалі цей пароль необхідно надати особі яка буде загружати логи СПС станції<br>
                    За допомогою цього пароля СПС будуть додавати свої логи до загального логу дипломної програми</em></font></td></tr>

        <tr><td colspan="2"><div id=divf1>

                     </div>
                        <div id=divhidden>

                </div>
                <input type=button onClick=plus(); value='+ СПС'><br><br></td></tr>
                    <tr><td colspan="2">
                          {{ Form::submit('Створити дипломну програму!')}}


                        </td></tr>



    </table>
        {{Form::close() }}
        </div>



@stop

@extends('thewall2.generalay')

    @section ('title')
        Редагування дипломної програми :: The Wall | Diplom
    @stop

    @section('content')
        <script>
            var n=1;


            document.getElementById('divhidden').innerHTML='<input type=hidden id=\"id'+n+'\" name=\"new_index_sps\" value=\"0\" >';
            function plus(){
                document.getElementById('divf'+n).innerHTML+='<br>'+n+' СПС: <input type=text id=\"id'+n+'\" name=\"new_sps_call_'+n+'\" size=\"10\"> баллов: <input type=text id=\"id'+n+'\" name=\"new_sps_score_'+n+'\" size=\"3\"> Пароль: <input type=text id=\"id'+n+'\" name=\"new_password_'+n+'\" size=\"3\"><input type=\"button\" id=\"id'+n+'\" onclick=del(id'+n+'); value=\"-\"> <div id=divf'+(n+1)+'></div>';
                document.getElementById('divhidden').innerHTML='<input type=hidden id=\"id'+n+'\" name=\"new_index_sps\" value=\"'+n+'\">';
                n++;

            }

            function del(id){
                document.getElementById(id).remove();


            }
        </script>
        <p> <center>
        <?php echo Form::open(array('controller' => 'UserWallController@saveProgram','enctype'=>"multipart/form-data")); ?>
            <table>
         @foreach ($dataArray as $data)
                    <tr><td align="right"> Название программы:</td> <td> {{Form::text('Name', $data->name, array('size' => '70') )}}<br><br></td></tr>
                    <tr><td align="right"> Описание: </td> <td> {{Form::textarea('Description', $data->description, array('size' => '68x10') )}}<br><br></td></tr>
                    <tr><td align="right"> Повторы: </td> <td> {{ Form::select('Repeat', array('0' => 'Запрещены', '1' => 'На разных диапазонах', '2'=>'Разрешены везде'), $data->repeat ) }}<br><br></td></tr>
                    <tr><td align="right"> Необходимо набрать: </td> <td> {{Form::text('ScoreFinal', $data->scoreFinal )}}<br><br></td></tr>
                    <tr><td align="right"> Очки по умолчанию: </td> <td> {{Form::text('ScoreDefault', $data->scoreDefault )}}<br><br></td></tr>
                    <tr><td align="right"> Картинка: </td> <td> <img src="{{$data->image}}"  width="100"><br><br></td></tr>
                    <tr><td align="right">Загрузить новое фото <i>(если нужно)</i>: </td><td>{{Form::file('Image')}}<br><br></td></tr>



     @endforeach
             <tr> <td align='center' colspan='2'>
             {{Form::hidden('Token', $data->token )}}
             <?php $i=0;?>
             <table>
             @foreach ($arraysps as $sps)
                 <?php $i++;
                       echo "<tr> <td align='right'>  СПС:&nbsp;&nbsp;</td><td> ".$sps->call."</td><td><input type='hidden' name='sps_call_".$i."'  value='".$sps->call."'></td><td>&nbsp;&nbsp;&nbsp; Очков:
                      </td><td> <input type='text' size='4' name='sps_score_".$i."' value='".$sps->score."'></td></tr>";
                    ?>
             @endforeach
                 <tr><td><div id=divf1>

                         </div>
                         <div id=divhidden>

                         </div>
                         <input type=button onClick=plus(); value='+ СПС'><br><br>
                     </td></tr>
             </table> </td></tr>
             {{Form::hidden("edit_sps_count", $i)}}
             <tr><td>  </td> <td align="right" bgcolor="#5f9ea0"> {{Form::submit('Сохранить')}}</td></tr>
            </table>
        {{ Form::close() }}
    </center>
    </p>

@stop

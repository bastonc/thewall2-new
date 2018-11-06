<?php
namespace Ukrainediploms\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ProgramsDiplom
{
    public function getsps($request)
    {
        $tokenParrentUser=md5(auth()->user()->email);
        $dataArraySps=DB::select('select `call`, `score`
                              from SPS
                              where tokenparrentprogram = ? AND tokenparentuser=?', [$request->t, $tokenParrentUser]);
        return $dataArraySps;
    }
    public function GetAllPrograms()
    {
        $token=md5(auth()->user()->email);
        //echo $token;
        $userProgramm=DB::select('select * from PROGRAMM where tokenparrentuser = ?', [$token]);
        //dd($userProgramm);
        return $userProgramm;
    }
    public function getProrgam($request)
    {
        $tokenParrentUser=md5(auth()->user()->email);
        $token = $request->t;
        //echo  $tokenParrentUser." ".$token;
        $dataArray=DB::select('select `name`, `description`, `scoreFinal`, `scoreDefault`, `image`,`token`, `repeat`
                              from PROGRAMM
                              where token = ? AND tokenparrentuser=?', [$token, $tokenParrentUser]);
        //dd($dataArray);

        return $dataArray;
    }
    public function saveProgram($request)
    {
        $tokenParrentUser=md5(auth()->user()->email);
       // dd(request()->all());
        if($request->hasFile('Image')) {
            $file = $request->file('Image');
            $file->move(public_path() . '/image', $file->getClientOriginalName());
            $filename = '\image\\' . $file->getClientOriginalName();
            $flag="repalceImage";
            $dataArray=DB::select('UPDATE `PROGRAMM` SET `name`= ? ,`repeat`= ?,`scoreDefault`= ?,`scoreFinal`=?,
                                `image`= ?,`description`= ? WHERE token = ? AND tokenparrentuser = ?', [request()->Name,
                request()->Repeat,
                request()->ScoreDefault, request()->ScoreFinal, $filename, request()->Description,
                request()->Token, $tokenParrentUser ]);
            for($i=1; $i<=request()->edit_sps_count;$i++)
            {
                $spsscore = "sps_score_" . $i;

                $spscall = "sps_call_" . $i;
                // echo $spscall . " " . $spsscore;
                DB::select('UPDATE `SPS` SET `score`=? WHERE `call`=? AND `tokenparentuser`=?', [request()->$spsscore, request()->$spscall, $tokenParrentUser]);
            }
            if (request()->new_idex_sps!=0)
            {
                for($i=1; $i<=request()->new_index_sps;$i++)
                {
                    $newspsscore = "new_sps_score_" . $i;
                    $prenewspspassword="new_password_".$i;
                    $newspspassword=md5(request()->$prenewspspassword);
                    $description="Добавлен при редактировании";

                    $newspscall = "new_sps_call_" . $i;
                    $pretokensps=request()->Token.$tokenParrentUser.$newspscall;
                    $tokensps=md5($pretokensps);
                    // echo $spscall . " " . $spsscore;
                    DB::insert('insert into SPS (`call`,`token`,`tokenparentuser`,`tokenparrentprogram`,`score`,`password`,`description`)
                                   values (?,?,?,?,?,?,?)', [request()->$newspscall,$tokensps,$tokenParrentUser,request()->Token,request()-> $newspsscore,$newspspassword,$description]);
                }
            }
        }
        else
        {
            $dataArray=DB::select('UPDATE `PROGRAMM` SET `name`= ? ,`repeat`= ?,`scoreDefault`= ?,`scoreFinal`=?,
                               `description`= ? WHERE token = ? AND tokenparrentuser = ?', [request()->Name,
                request()->Repeat,
                request()->ScoreDefault, request()->ScoreFinal,  request()->Description,
                request()->Token, $tokenParrentUser ]);
            for($i=1; $i<=request()->edit_sps_count;$i++)
            {
                $spsscore = "sps_score_" . $i;

                $spscall = "sps_call_" . $i;
               // echo $spscall . " " . $spsscore;
                DB::select('UPDATE `SPS` SET `score`=? WHERE `call`=? AND `tokenparentuser`=?', [request()->$spsscore, request()->$spscall, $tokenParrentUser]);
            }
            if (isset(request()->new_index_sps))
            {
                for($i=1; $i<=request()->new_index_sps;$i++)
                {
                    $newspsscore = "new_sps_score_" . $i;
                    $prenewspspassword="new_password_".$i;
                    $newspspassword=md5(request()->$prenewspspassword);
                    $description="Добавлен при редактировании";

                    $newspscall = "new_sps_call_" . $i;
                    $pretokensps=request()->Token.$tokenParrentUser.$newspscall;
                    $tokensps=md5($pretokensps);
                    // echo $spscall . " " . $spsscore;
                    DB::insert('insert into SPS (`call`,`token`,`tokenparentuser`,`tokenparrentprogram`,`score`,`password`,`description`)
                                   values (?,?,?,?,?,?,?)', [request()->$newspscall,$tokensps,$tokenParrentUser,request()->Token,request()-> $newspsscore,$newspspassword,$description]);
                }
            }

        }
        //dd($dataArray);
        return $dataArray;
    }
    public function getLog($request)
    {
        $tokenParrentUser=md5(auth()->user()->email);
        $token = request()->t;
       // echo  $tokenParrentUser." ".$token;
        $dataArray=DB::select('select * from QSO where tokenprogramm = ? AND tokentuser=?', [$token, $tokenParrentUser]);
       // dd($dataArray);
        return $dataArray;
    }
    public function closeProgramm($request)
    {
        $tokenprogram=$request->t;
        $tokenUser=md5(auth()->user()->email);
        $closeProgram=DB::select('UPDATE `PROGRAMM` SET `status`= ? WHERE `token` = ? AND `tokenparrentuser` = ?',
            ['close', $tokenprogram, $tokenUser]);

        return $closeProgram;
    }

    public function openProgramm($request)
    {
        $tokenprogram=$request->t;
        $tokenUser=md5(auth()->user()->email);
        $openProgram=DB::select('UPDATE `PROGRAMM` SET `status`= ? WHERE `token` = ? AND `tokenparrentuser` = ?',
            ['open', $tokenprogram, $tokenUser]);
        return  $openProgram;

    }

    public function deleteProgramm($request)
    {
        $tokenprogram=$request->t;
        $tokenUser=md5(auth()->user()->email);
        $deleteProgram=DB::delete('delete from PROGRAMM where `token`=? AND `tokenparrentuser`=?',[$tokenprogram,$tokenUser]);
        return  $deleteProgram;

    }
    public function getStatusProgramm($request)
    {
        $tokenprogram=$request->t;
        $tokenParrentUser=md5(auth()->user()->email);
        $arrayProgramm=DB::select('select `status` from PROGRAMM where token = ? AND tokenparrentuser=?', [$tokenprogram, $tokenParrentUser]);
        foreach($arrayProgramm as $statusRecord)
        {
            $statusProgramm=$statusRecord->status;
        }
        return  $statusProgramm;

    }
    public function getNameProgramm($request)
    {
        $tokenprogram=$request->t;
        $tokenParrentUser=md5(auth()->user()->email);
        $arrayProgramm=DB::select('select `name` from PROGRAMM where token = ? AND tokenparrentuser=?', [$tokenprogram, $tokenParrentUser]);
        foreach($arrayProgramm as $name)
        {
            $nameProgramm=$name->name;
        }
        return  $nameProgramm;

    }
    public function createNewProgramm(Request $request)
    {

        // получаем и сохраняем картинку диплома
        if ($request->request->has('form[dynamic_field]')) {
            $builder->add('dynamic_field', TextType::class, []);
            dd($builder);
        }


        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $file->move(public_path() . '/image',$file->getClientOriginalName());
            $filename= '\image\\'.$file->getClientOriginalName();
        } else $filename='NONE';

        //request()->Image;
        $tokenParrentUser=md5(auth()->user()->email);
        $name=request()->Name;
        $pretoken=auth()->user()->email.$name;
        $tokenprogramm=md5($pretoken);
        $repeat=request()->Repeat;
        $scoreDefault=request()->ScoreDefault;
        $scoreFinal=request()->ScoreFinal;
        $description=request()->Description;
        $status='new';

        $counter=request()->index_sps;
        $programmVerify=DB::select('select `id` from PROGRAMM where `name` = ? AND tokenparrentuser=?', [$name, $tokenParrentUser]);

        if($programmVerify==NULL)
        {
        DB::insert('insert into PROGRAMM (`name`,`token`,`tokenparrentuser`,`repeat`,`scoreDefault`,`scoreFinal`,`description`,`status`,`image`)
                                    values (?,?,?,?,?,?,?,?,?)', [$name,$tokenprogramm,$tokenParrentUser,$repeat,$scoreDefault,$scoreFinal,$description, $status,  $filename]);

        $index_sps=request()->index_sps;
        for($i=1; $i<=$index_sps; $i++)
        {
            $call = "sps_call_".$i;
          //  dd(request()->$call);
            $pretokensps=$tokenprogramm.$tokenParrentUser.$call;
            $tokensps=md5($pretokensps);
            $score= "sps_score_".$i;
            $preprepasswordsps="password_".$i;
            $prepasswordsps=request()->$preprepasswordsps;
            $password_sps=md5($prepasswordsps);
            $description="description";
            DB::insert('insert into SPS (`call`,`token`,`tokenparentuser`,`tokenparrentprogram`,`score`,`password`,`description`)
                                   values (?,?,?,?,?,?,?)', [request()->$call,$tokensps,$tokenParrentUser,$tokenprogramm,request()->$score,$password_sps,$description]);
        }

        $flag="OK";

        } else
        {
            echo "Программа с таким именем уже есть";
            $flag="NO";

        }
        return  $flag;

    }
    public function scoreDefinition($operator, $tokenprogramm)
    {
        $spscall=DB::select('select `score` from SPS where `call`=? AND `tokenparrentprogram`=?',[$operator, $tokenprogramm]);
        if ($spscall!=NULL)
        {

            foreach($spscall as $scores) {
                $score = $scores->score;

            }
        }
        else {
            $scoredefault=DB::select('select `scoreDefault` from PROGRAMM where `token`=?',[$tokenprogramm]);



            foreach ($scoredefault as $defaultScore)
            $score=$defaultScore->scoreDefault;



        }
        return $score;
    }

    public function getProgrammInfo ($tokenprogramm)
    {
        $totalScores=DB::select('select * from PROGRAMM where `token`=?',[$tokenprogramm]);

        return $totalScores;
    }
    public function setComplitedForCall($token, $call)
    {
        DB::select('UPDATE `QSO` SET `status`= ? WHERE `call` = ? AND `tokenprogramm` = ?',
            ['Completed', $call, $token]);


    }




}

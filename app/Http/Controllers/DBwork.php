<?php
namespace Ukrainediploms\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DBwork
{
    public function RecordQSOtoBase($arrayData, $tokenprogramm)
    { //dd($arrayData);
        $tokenuser=md5(auth()->user()->email);
        $repeatArray=DB::select('select `repeat` from PROGRAMM where token = ? AND tokenparrentuser=?', [$tokenprogramm, $tokenuser]);
        $repeat=$repeatArray[0];

            for($index=0;$index<count($arrayData);$index++) {   //echo count($arrayRecord);
                $record = $arrayData[$index];

                if ($repeat->repeat == "1") {
                    $qsoArray = DB::select('select `id` from QSO where  `call` = ? AND `band` = ? AND `tokenprogramm`=?', [$record['call'], $record['band'], $tokenprogramm]);
                    if ($qsoArray == NULL) {
                        DB::insert('insert into QSO (`call`,`operator`,`qso_date`,`time_on`,`band`,`freq`,`rst_sent`,`tokenprogramm`, 
                                                         `tokentuser`,`programname`) values (?,?,?,?,?,?,?,?,?,?)',
                            [$record['call'], $record['operator'], $record['qso_date'],
                                $record['time_on'], $record['band'], $record['freq'],
                                $record['rst_sent'], $tokenprogramm, $tokenuser, 'N']);


                    }
                }
                if ($repeat->repeat == "0")
                {
                    $qsoArray = DB::select('select `id` from QSO where  `call` = ? AND `tokenprogramm`=?', [$record['call'], $tokenprogramm]);
                    if($qsoArray==NULL) {
                        DB::insert('insert into QSO (`call`,`operator`,`qso_date`,`time_on`,`band`,`freq`,`rst_sent`,`tokenprogramm`, 
                                                         `tokentuser`,`programname`) values (?,?,?,?,?,?,?,?,?,?)',
                            [$record['call'], $record['operator'], $record['qso_date'],
                                $record['time_on'], $record['band'], $record['freq'],
                                $record['rst_sent'], $tokenprogramm, $tokenuser, 'N']);
                    }


                }
                if($repeat->repeat == "2")
                {
                    DB::insert('insert into QSO (`call`,`operator`,`qso_date`,`time_on`,`band`,`freq`,`rst_sent`,`tokenprogramm`, 
                                                         `tokentuser`,`programname`) values (?,?,?,?,?,?,?,?,?,?)',
                        [$record['call'], $record['operator'], $record['qso_date'],
                            $record['time_on'], $record['band'], $record['freq'],
                            $record['rst_sent'], $tokenprogramm, $tokenuser, 'N']);
                }
                }

        $flag = 'ОК';



        return $flag;
    }

    public function getProgrammFrontEnd()
    {
        $programms = DB::table('PROGRAMM')->where('status','=','open')->paginate(3);
        return $programms;
    }

    public function getProgrammInfo($tokenprogramm)
    {
        $programmInfo=DB::select('select * from PROGRAMM where  `token`=?', [$tokenprogramm]);
        return $programmInfo;
    }

    public function searchCall($call, $tokenprogramm)
    {
        $calls=DB::select('select * from QSO where `call`=? AND `tokenprogramm`=?',[$call,$tokenprogramm]);
        return $calls;
    }

    public function getSpsForProgram($tokenprogramm)
    {
        $spsInfo=DB::select('select `call`,`score` from SPS where  `tokenparrentprogram`=?', [$tokenprogramm]);
        return $spsInfo;
    }

}
//echo $res['call']." | Date:".$res['qso_date']." | Time: ". $res['time_on']." | Freq: ".$res['band']." | сработал с ". $res['operator']." | RST ". $res['rst_sent']."<br>";
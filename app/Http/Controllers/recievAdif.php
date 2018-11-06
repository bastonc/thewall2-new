<?php

namespace Ukrainediploms\Http\Controllers;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class recievAdif
{
    public function getFile(Request $request)
    {
        foreach ($request->file() as $file) {

          //  echo $ext;
            if(strtolower($file->getClientOriginalExtension())=="adi")
            {
            $file->move(storage_path('adif'), $file->getClientOriginalName());
            $filename= storage_path('adif//').$file->getClientOriginalName();
            } else
                {
                    $filename="STOP";
                    echo'Вы пытаетесь загрузить не ADIF файл';
                }
        }
       // dd ($filename);

        return $filename;

    }
    public function parseAdif($filename)
    {
    //echo $filename;
        $p = new ADIF_Parser;
        $p->load_from_file($filename);
        $p->initialize();
        $i=0;
        $line = array('rst_sent', 'call', 'qso_date', 'time_on', 'time_on', 'band', 'operator', 'freq');
        while($record = $p->get_record())
        {
            if(count($record) == 0)
            {
                break;
            };

            for ($i=0; $i<count($line); $i++)
            {
                if(array_key_exists($line[$i],$record)==false || $record[$line[$i]]=="" || $record[$line[$i]]==" " )
                {$record[$line[$i]]="Undef";}
            }

            $arrayRecord[]=$record;

             //echo $i." ".$record['call']." | Date:".$record['qso_date']." | Time: ". $record['time_on']." | Freq: ".$record['band']." | сработал с ". $record['operator']." | RST ". $record['rst_sent']."<br>";

        }
        return $arrayRecord;
    }

    public function recordToBase($arrayRecord)
    { //dd($arrayRecord);
        /*
        for($index=0;$index<count($arrayRecord);$index++)
        {   //echo count($arrayRecord);
            $record=$arrayRecord[$index];
            echo $index." ".$record['rst_sent']."<br>";
            $flag='ОК';
        }
       */

        $flag='ОК';
        return $flag;
    }

}
<?php

namespace Ukrainediploms\Http\Controllers;
//namespace Ukrainediploms;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use PhpParser\Node\Expr\Include_;
use Illuminate\Http\File;

class uploadadifController extends BaseController {

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getForm ()
    {
        $token = new ProgramsDiplom;
        $tokenArray=$token->GetAllPrograms();
        foreach($tokenArray as $tokenkey)
        {
            $token=$tokenkey->token;
        }
        return View('thewall2/formadif', ["token"=>$token]);
    }


    public function upload (Request $request)
    {
        $file = new recievAdif;
        $recordFile = new DBwork();

        $tokenprogramm=$request->Token;
        $pathFile=$file->getFile($request);
        if ($pathFile!="STOP" || NULL)
        {
             $arrayRecord=$file->parseAdif($pathFile);
             //dd($arrayRecord);
             if($arrayRecord!=NULL)
                {
                    $result=$recordFile->RecordQSOtoBase($arrayRecord, $tokenprogramm);
                        if($result=="ОК")
                        {
                           //dd($arrayRecord);
                           return view('thewall2/uploadResult',['arrayRecord'=>$arrayRecord]);
                        }   else echo "<br>Don't record to databse<br>";
                } else echo "<br>QSO not found<br>";
        }
        else echo "<br>Incorrect file path<br>";

         //   echo $res['call']." | Date:".$res['qso_date']." | Time: ". $res['time_on']." | Freq: ".$res['band']." | сработал с ". $res['operator']." | RST ". $res['rst_sent']."<br>";

        return 0;

    }

    public  function test()

    {
        $index=1;
        if ($index==1) {
        return view('thewall2/test');
        } else return view('index');
    }

}
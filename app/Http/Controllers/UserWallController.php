<?php

namespace Ukrainediploms\Http\Controllers;

use Illuminate\Http\Request;

class UserWallController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getListProgram(Request $request)

      {

          $listProgram= new ProgramsDiplom;
          $getList=$listProgram->GetAllPrograms();
          return view("thewall2/cabinet", ["getList"=>$getList]);

        /* foreach($getList as $list)
          {
              //dd($list);
              echo $list->name."<br>";
              echo $list->description."<br>";
              echo $list->scoreFinal."<br>";
              echo $list->scoreDefault."<br>";
          }*/

      }
    public function editProgram(Request $request)
    {
        $getdata= new ProgramsDiplom;
        $data=$getdata->getProrgam($request);
        $sps=$getdata->getsps($request);

        if($data==NULL)
        {
            $name=md5(auth()->user()->email);
            return view("thewall2/erroracces",["ErrorUser"=>$name]);
        }
        else
        {
          return view("thewall2/programform",["dataArray"=>$data,"arraysps"=>$sps]);
        }

    }
    public function saveProgram(Request $request)
    {
        $save = new ProgramsDiplom;
        $save->saveProgram($request);
        return redirect()->route('cabinet');

    }
    public function logProgram(Request $request)
    {
        $record = new ProgramsDiplom;
        $recordArray=$record->getLog($request);
        $resolvForm=$record->getStatusProgramm($request);
        $name=$record->getNameProgramm($request);
        return view("thewall2/logprogram",["arrayRecord"=>$recordArray, "Token"=>$request->t, "resolvForm"=>$resolvForm, "NameProgramm"=>$name]);

    }
    public function delProgram(Request $request)
    {
        $delete=new ProgramsDiplom;
        $delete->deleteProgramm($request);
        return redirect()->route('cabinet');

    }
    public function closeProgram(Request $request)
    {
        $stop = new ProgramsDiplom;
        $stop->closeProgramm($request);
        return redirect()->route('cabinet');

    }
    public function openProgram(Request $request)
    {
        $stop = new ProgramsDiplom;
        $stop->openProgramm($request);
        return redirect()->route('cabinet');

    }
    public function createProgram(Request $request)
    {
        $createProgramm = new ProgramsDiplom;
        $createProgramm->createNewProgramm($request);
        return redirect()->route('cabinet');

    }

    //

}

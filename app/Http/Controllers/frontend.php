<?php
namespace Ukrainediploms\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;

class frontend
{
    public function getProgramm(Request $request){

        $programms = new DBwork;
        $getProgramm = $programms->getProgrammFrontEnd();
        return view('thewall2/indexProgramm',["Programms"=>$getProgramm]);

    }

    public function programmInside (Request $request) {
        $token=$request->p;
        $programmInside = new DBwork;
        $programmInfo=$programmInside->getProgrammInfo($token);
        $spsMember=$programmInside->getSpsForProgram($token);

        //echo "I have token: ",$token, "<br>", $programmInfo[0]->name;
        if($programmInfo!=NULL)
        {
        $programmName=$programmInfo[0]->name;
        return view('thewall2/programmInfo',["programmInfo"=>$programmInfo, "programmName"=>$programmName, "spsMember"=>$spsMember]);
        }
        else
            echo "Error! I don't know this programm (Programm inside)";
        //

    }

    public function  searchCall(Request $request) {

        $call=$request->searchcall;
        $tokenprogramm=$request->Token;
        $totalscore=0;
        $result = $this->resultForCall($call, $tokenprogramm);




    /*
        //echo $call,"<br>";
        //echo $tokenprogramm,"<br>";


*/
        $scoreDefinition = new ProgramsDiplom;
        $searchinProgramm = new DBwork;
        $searchCallInProgramm = $searchinProgramm->searchCall($call,$tokenprogramm);
        $programmInfos=$scoreDefinition->getProgrammInfo($tokenprogramm);
        foreach ($programmInfos as $programmInfo)
        {
            $finalScoreProgramm=$programmInfo->scoreFinal;
            $programmName=$programmInfo->name;
        }
        foreach($searchCallInProgramm as $info  ){
            $score = $scoreDefinition->scoreDefinition($info->operator,$tokenprogramm);
            $info->score=$score;
            $totalscore=$totalscore+$info->score;
            // echo $info->call, " -> ", $info->operator," => ",$info->score,"<br>";

        }

        if($result==0)
        {
           // echo "Congratulation!<br> Diplom \"", $programmName,"\" completed!<br> Final score: ", $finalScoreProgramm, "<br>";


            return view("thewall2/resultcallcompleted",["searchCallInProgramm"=>$searchCallInProgramm, "programmName"=>$programmName,
                "totalScore"=>$totalscore, "finalScoreProgramm"=>$finalScoreProgramm, "call"=>$call, "tokenProgramm"=>$tokenprogramm, "programmInfo"=>$programmInfos]);/* Тут возрвщаем Вьюху выполенного диплома
             *  во вьюху с формой ввода E-mail (выполенный диплом) передаем:
             * 1. массив $searchCallInProgramm в котором информация по каждому QSO с очками
             * 2. название программы - $programmName,
             * 3. кол-во набранных очков - $totalscore
             * 4. необходимое кол-во очков которое необходимо набрать для выполнения программы - $finalScoreProgramm
             */
        }
        else {
           // echo " Diplom \"", $programmName,"\" in action!<br> Final score: ", $finalScoreProgramm, "<br>";

            return view("thewall2/resultcall",["searchCallInProgramm"=>$searchCallInProgramm, "programmName"=>$programmName,
                                "totalScore"=>$totalscore, "finalScoreProgramm"=>$finalScoreProgramm, "call"=>$call, "tokenProgramm"=>$tokenprogramm, "programmInfo"=>$programmInfos]);
            /* Тут возрвщаем Вьюху невыполенного диплома
            *  во вьюху передаем:
            * 1. массив $searchCallInProgramm в котором информация по каждому QSO с очками
            * 2. название программы,
            * 3. кол-во набранных очков
            * 4. необходимое кол-во очков которое необходимо набрать для выполнения программы - $finalScoreProgramm
            */

        }
        //echo "Total: ",$totalscore;

        //dd ($searchCallInProgramm);




    }
    public function sendemail(Request $request){
        if($request->email==NULL || $request->token==NULL || $request->call==NULL)
        {echo "ERROR! I don't have E-mail or token"; }
        elseif ($request->email!=NULL && $request->token!=NULL && $request->call!=NULL) {
            /*
             * Тут необходимо проверить дейсвительно ли позівной $call выполнил условия диплома $token
             * Если условия выполенны - получить название дипломной программы и поодготовить текст для передачи в шаблон
             *
             *
             */


            $call = $request->call;
            $to = $request->email;
            $subject = "New diplom for " . $call;
            $from = "eo90l@gmail.com";
            $text = "Hello loreprism blah blah blah";
            //$data = "hello=>Sergey";
            $this->sendMail($to, $subject, $from, $call, $text);
            $data[]=["email"=>$to, "call"=>$call, "token"=>$request->token];
            //dd($data);
            $setCall = new ProgramsDiplom;
            $setCall->setComplitedForCall($request->token, $call);
            return view('thewall2/alert',["status"=>"congratulations", "data"=>$data]);
        }
            //echo "hello!<br> This is fronend controller and sendmail method<br> I have<br> email: ", $request->email,"<br> Token: ", $request->token,"<br>";}

            else
        {echo "Unknown error";}
    }

    public function sendMail ($to, $subject, $from, $call, $text)
    {

        $stat=Mail::send('thewall2.mail.email',['data'=> $text, 'call'=>$call], function ($message) use ($to,$subject,$from) {

            $message->from($from,$subject);
            $message->to($to);


        });
       // dd($stat);
        return $stat;

    }
    public function  resultForCall( $call, $tokenprogramm) {


        $totalscore=0;


        $searchinProgramm = new DBwork;
        $scoreDefinition = new ProgramsDiplom;

        $searchCallInProgramm = $searchinProgramm->searchCall($call,$tokenprogramm);

        foreach($searchCallInProgramm as $info  ){
            $score = $scoreDefinition->scoreDefinition($info->operator,$tokenprogramm);
            $info->score=$score;
            $totalscore=$totalscore+$info->score;


        }
        $programmInfos=$scoreDefinition->getProgrammInfo($tokenprogramm);
        foreach ($programmInfos as $programmInfo)
        {
            $finalScoreProgramm=$programmInfo->scoreFinal;

        }

        if($totalscore >= $finalScoreProgramm)
        {
            $win=0;
        }
        else {


            $win=1;


        }
        return $win;

        //dd ($searchCallInProgramm);




    }



}
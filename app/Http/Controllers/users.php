<?php
namespace Ukrainediploms\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class users
{
    public function programmUsers()
    {
    // $token=md5(auth()->user()->email);
     $listProgram= new DBwork;
     $getList=$listProgram->Programs();
    }

}
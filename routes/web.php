<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**Route::get('/', function () {
    return view('index');
});**/
Route::get('/', 'frontend@getProgramm');
Route::get('programm', 'frontend@programmInside');
Route::post('/searchcall','frontend@searchCall');
Route::get('/addadif', function () {
    return view('index');
});
Route::post('/sendcompete', 'frontend@sendemail');
Route::get('upload', 'uploadadifController@getForm');
//Route::get('get','uploadadifController@upload');
//Route::post('get','uploadadifController@upload');
Route::get('test', 'uploadadifController@test');


//Route::controller('getForm','uploadadifController');
Auth::routes();

Route::get('/cabinet', 'UserWallController@getListProgram')->name('cabinet');;
Route::get('/home', 'HomeController@index');
Route::get('edit','UserWallController@editProgram');
Route::post('edit','UserWallController@saveProgram');
Route::get('log','UserWallController@logProgram');
Route::get('del','UserWallController@delProgram');
Route::get('open','UserWallController@openProgram');
Route::get('newprogramm', function (){ return view("thewall2/newProgramForm");})->name('createProgramForm');
Route::post('newprogramm', 'UserWallController@createProgram' );
/*
 * array ('before'=>'csrf', function () {
    $rules = array(
        'Name'=>array('required', 'unique:PROGRAMM,name'),
        'Description'=>array('required'),
        'ScoreFinal'=>array('required'),
        'ScoreDefault'=>array('required')
    );
    $validation=Validator::make (request()->all(),$rules);
    if($validation->fails())
    {
        return Redirect()->route('createProgramForm');
    }  return redirect()->action('UserWallController@createProgram');})
*/
Route::get('close', 'UserWallController@closeProgram');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::get('/', ['uses' => 'admin\AdminController@show'])->name('admin_index');

        Route::get('upload', 'uploadadifController@getForm');
        Route::get('get','uploadadifController@upload');
        Route::post('get','uploadadifController@upload');

        //Route::get('edit','UserWallController@editProgram');
//log close /del

    }
);
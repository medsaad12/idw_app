<?php

use App\Models\Form;
use App\Models\User;
use App\Models\Equipe;
use App\Models\Tableau;
use App\Models\TableauRow;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CalculController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TableauController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/profile');
    } else {
        return view('auth.login');
    } 
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/chat/{id?}',[ChatController::class,'index'])->middleware('auth' ,'permission:chat');

Route::post('/send',[ChatController::class,"send"])->middleware('auth' ,'permission:chat');

Route::post('/sendtogroup',[ChatController::class,"sendtogroup"])->middleware('auth' ,'permission:chat');

Route::resource('/groupes',GroupController::class)->middleware('auth' ,'permission:chat');

Route::get('download/{id}',[ChatController::class,"download"])->middleware('auth' ,'permission:chat');

Route::resource('/users',UserController::class)->middleware('auth' ,'permission:G-utilisateurs');

Route::post('/forms/submit',[FormController::class , "submit"])->middleware('auth');

Route::get('/forms/submissions/{id}',[FormController::class , "submissions"]);

Route::get('/forms/sub',function () {
    return view('forms.liste-sub',["forms" => Form::all()]);
});

Route::resource('/forms',FormController::class);

Route::get('/presence/user/{name}',[PresenceController::class , "presence_user" ]);

Route::resource('/presence',PresenceController::class)->middleware('auth','permission:G-présence');


Route::get('/entretiens/search',[EntretienController::class,"search"])->middleware('auth','permission:G-entretiens');

Route::resource('/entretiens',EntretienController::class)->middleware('auth','permission:G-entretiens');

Route::resource('/formations',FormationController::class)->middleware('auth','permission:G-formations');

Route::get('/conversation',function () {
    return view('G-conversation.conversation' , ['users'=>User::all(),'messages'=>[]]);
});

Route::post('/getConversation',[ChatController::class,"getConversation"]);

Route::post('/notifications/read',[NotificationController::class,'readNotification']);

Route::resource('/notifications',NotificationController::class);

Route::get('/calendrier',[CalendrierController::class,"get"])->middleware('auth');
Route::get('/calendrier/ajouter',function(){
    return view('calendrier/ajouter_jour');
})->middleware('auth');
Route::post('/calendrier/delete/{id}',[CalendrierController::class,"delete"])->middleware('auth');
Route::post('/calendrier/add',[CalendrierController::class,"add"])->middleware('auth');
Route::post('/calendrier/modify/{id}',[CalendrierController::class,"edit"])->middleware('auth');

Route::resource('/equipes',EquipeController::class)->middleware('auth');


Route::get('/tableaux/{id}',function ($id) {
    $equipe = Equipe::find($id);
    $tableaux = Tableau::where('equipe_id',$id)->get();
    return view('tableaux.equipe-tableaux',['tableaux'=>$tableaux,'equipe'=>$equipe]);
});

Route::get('/tableaux/{id}/create',function ($id)
{
    $equipe = Equipe::find($id);
    function myfunction($v)
    {
      return User::find($v);
    }
    $agents = array_map("myfunction",json_decode($equipe->agents));
    
    return view('tableaux.create-tableau',[ 'equipe' => $equipe , 'agents' => $agents ]);
    });

Route::get('/tableaux',function () {
    return view('tableaux.equipes',['equipes'=>Equipe::all()]);
});

Route::post('tableaux/store',[TableauController::class,'store']);

Route::post('tableaux/update/{id}',[TableauController::class,'update']);

Route::get('/tableau/{id}',function ($id) {
    $tableau = Tableau::find($id);
    $equipe = Equipe::find($tableau->equipe_id);
    $rows = TableauRow::where("tableau_id",$id)->get();
    return view('tableaux.tableau',['tableau'=>$tableau , 'rows' => $rows , 'equipe' => $equipe]);
});

Route::get('/production',[ProductionController::class,'index']);

Route::get('/calcul',[CalculController::class,"get_agents"]);
Route::get('/calcul/{id}',[CalculController::class,"get_agent_data"]);
Route::post('/calcul/save',[CalculController::class,'save']);

Route::get('/stat',[StatController::class,'get_chart_data']);
Route::get('/stats/{id}',[StatController::class,'get_agent_stats']);

Route::get('/mail/create',[MailController::class,'create']);
Route::post('/mail/send',[MailController::class,'send']);



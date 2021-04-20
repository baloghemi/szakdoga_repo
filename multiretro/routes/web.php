<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ActionpointController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PlusMinusTaskController;
use App\Http\Controllers\BlogController;


use Illuminate\Support\Facades\Route;

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

//főoldal
Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'profile.userprofile')->middleware('auth');

//PROFIL
Route::get('/userprofile', [UserProfileController::class,'profile'])->name('userProfile');
//profil módosítása
Route::get('/userprofile/{user_id}', [UserProfileController::class, 'send_to_modify'])->name('sendToModifyUser');
Route::post('/userprofile/{user_id}', [UserProfileController::class, 'modify_profile'])->name('modifyUserProfile');

//CSAPATOK
Route::get('/teams', [TeamController::class,'teams'])->name('teams');
//új csapat
Route::get('/new_team', [TeamController::class,'send_to_new_team'])->name('sendToNewTeam');
Route::post('/new_team', [TeamController::class,'new_team'])->name('newTeam');
//csapat módosítása
Route::get('/teams/{team_id}', [TeamController::class,'send_to_modify_team'])->name('sendToModifyTeam');
Route::post('/teams/{team_id}', [TeamController::class,'modify_team'])->name('modifyTeam');
//csapat listázása
Route::get('/team_list', [TeamController::class,'team_list'])->name('teamList');
//csapat törlése
Route::get('/team_list/{team_id}', [TeamController::class,'delete_team'])->name('deleteTeam');


//MEGBESZÉLÉS
Route::get('/meetings', [MeetingController::class,'meetings'])->name('meetings');
//új megbeszélés
Route::get('/new_meeting', [MeetingController::class,'send_to_new_meeting'])->name('sendToNewMeeting');
Route::post('/new_meeting', [MeetingController::class,'new_meeting'])->name('newMeeting');
//megbeszélés módosítása
Route::get('/meetings/{meeting_id}', [MeetingController::class,'send_to_modify_meeting'])->name('sendToModifyMeeting');
Route::post('/meetings/{meeting_id}', [MeetingController::class,'modify_meeting'])->name('modifyMeeting');
//megbeszélés listázása
Route::get('/meeting_list', [MeetingController::class,'meeting_list'])->name('meetingList');
//megbeszélés törlése
Route::get('/meeting_list/{meeting_id}', [MeetingController::class,'delete_meeting'])->name('deleteMeeting');
//csatlakozás
Route::get('/join_meeting/{meeting_id}', [MeetingController::class,'join_meeting'])->name('joinMeeting');
//megbeszélésen belül akciópont státusz módosítás
Route::get('/right{act_id}', [MeetingController::class,'status_change_right_meeting'])->name('statusChangeRightMeeting');
Route::get('/left{act_id}', [MeetingController::class,'status_change_left_meeting'])->name('statusChangeLeftMeeting');
//megbeszélés lezárása
Route::get('/meeting_end{meeting_id}', [MeetingController::class,'end_meeting'])->name('endMeeting');




//AKCIÓPONT
Route::get('/actionpoints', [ActionpointController::class,'actionpoints'])->name('actionpoints');
//csapat listázása
Route::get('/actionpoint_list', [ActionpointController::class,'actionpoint_list'])->name('actionpointList');
//státusz módosítás
Route::get('/actionpoints/right{act_id}', [ActionpointController::class,'status_change_right'])->name('statusChangeRight');
Route::get('/actionpoints/left{act_id}', [ActionpointController::class,'status_change_left'])->name('statusChangeLeft');
//új akciópont
Route::get('/new_actionpoint{meeting_id}', [ActionpointController::class,'new_actionpoint'])->name('newActionpoint');
//akciópont módosítása
Route::get('/actionpoints/{act_id}', [ActionpointController::class,'send_to_modify_actionpoint'])->name('sendToModifyActionpoint');
Route::post('/actionpoints/{act_id}', [ActionpointController::class,'modify_actionpoint'])->name('modifyActionpoint');
//akciópont törlése
Route::get('/actionpoint_delete_{act_id}', [ActionpointController::class,'delete_actionpoint'])->name('deleteActionpoint');


//PLUSZ-MÍNUSZ FELADAT
//új plus-mínusz feladat
Route::get('/new_plus_minus{meeting_id}', [PlusMinusTaskController::class,'new_task'])->name('newPlusMinusTask');
//pozitív hozzáadás
Route::get('/add_positive{task_id}', [PlusMinusTaskController::class,'positive_add'])->name('positiveAdd');
//negatív hozzáadás
Route::get('/add_negative{task_id}', [PlusMinusTaskController::class,'negative_add'])->name('negativeAdd');



//BLOG
Route::get('/blogs', [BlogController::class,'blogs'])->name('blogs');
//új blog
Route::get('/new_blog', [BlogController::class,'send_to_new_blog'])->name('sendToNewBlog');
Route::post('/new_blog', [BlogController::class,'new_blog'])->name('newBlog');
//blog módosítása
Route::get('/blogs/{blog_id}', [BlogController::class,'send_to_modify_blog'])->name('sendToModifyBlog');
Route::post('/blogs/{blog_id}', [BlogController::class,'modify_blog'])->name('modifyBlog');
//blog listázása
Route::get('/blog_list', [BlogController::class,'blog_list'])->name('blogList');
//blog törlése
Route::get('/delete_blog{blog_id}', [BlogController::class,'delete_blog'])->name('deleteBlog');




//NAPLÓ
Route::get('/diary', [DiaryController::class,'diary'])->name('diary');
//időjárás jelentés
Route::get('/diary/weather_report{meeting_id}', [DiaryController::class,'weather_report'])->name('weatherReport');



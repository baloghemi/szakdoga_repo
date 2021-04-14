<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ActionpointController;


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



//AKCIÓPONTOK
Route::get('/actionpoints', [ActionpointController::class,'actionpoints'])->name('actionpoints');
//csapat listázása
Route::get('/actionpoint_list', [ActionpointController::class,'actionpoint_list'])->name('actionpointList');

//blogok
Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

//napló
Route::get('/diary', function () {
    return view('diary');
})->name('diary');

<?php

 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\OfficeHours;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AnnouncemetsController;

use App\Http\Controllers\ScheudleController;
use App\Http\Controllers\Top50Controller;
use App\Http\Controllers\ExamHallController;
use App\Http\Controllers\gpController;
use App\Http\Controllers\courseEvaluation;
use App\Http\Controllers\PrerequisiteCousreController;
use App\Http\Controllers\CourseReigesterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProgramPerferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\TAController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// test2
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('data',[OfficeHours::class,'index']);
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/returnType', [AuthController::class, 'returnType']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);   
    Route::post('sendPasswordResetLink', 'App\Http\Controllers\PasswordResetRequestController@sendEmail');
    Route::post('resetPassword', 'App\Http\Controllers\ChangePasswordController@passwordResetProcess');

});
Route::post('sendEmail',[MailController::class,'sendEmail']);


Route::get('/getAllAnnouncemets',[AnnouncemetsController::class,'getAllAnnouncment']);
Route::get('/getTopLevel50/{level}',[Top50Controller::class,'getTopLevel50']);
Route::get('/getTopDept50/{dept?}',[Top50Controller::class,'getTopDept50']);
Route::get('/getTopCourse50/{CourseName}',[Top50Controller::class,'getTopCourse50']);
Route::get('/getAllCourses',[Top50Controller::class,'getAllCourses']);
Route::get('/getAllDepartments',[Top50Controller::class,'getAllDepartments']);
Route::get('/downloadScheudle/{Scheudle_Name}',[ScheudleController::class,'downloadScheudle']);
Route::get('/getexamHall/{studentID}',[ExamHallController::class,'ExamHalls']);


Route::get('/student_info/{token}',[AuthController::class,'getStudentInfo']);
Route::get('/getCourseGroup/{courseID}',[CourseReigesterController::class,'getCourseGroup']);
Route::get('/getCourseInfo/{courseID}',[CourseReigesterController::class,'getCourseInfo']);
Route::post('/registerCourse',[CourseReigesterController::class,'registerCourse']);
Route::get('/returnCourseResult/{studentid}',[CourseReigesterController::class,'returnCourseResult']);
Route::get('/returnScheudule/{studentid}',[CourseReigesterController::class,'returnScheudule']);
Route::post('/registerCourses',[CourseReigesterController::class,'registerCourses']);

Route::post('/registerGP',[gpController::class,'insert']);
Route::post('/courseEvaluation',[courseEvaluation::class,'insertCourseEvaluation']);

// Route::post('/professorEvaluation',[courseEvaluation::class,'insertProfessorEvaluation']);
// Route::post('/TAEvaluation',[courseEvaluation::class,'insertTAEvaluation']);
Route::get('/courseEvaluationDetails/{courseID}',[courseEvaluation::class,'getCourseDetails']);
Route::get('/CourseeForSemester/{level}/{semester}/{department}/{id}',[PrerequisiteCousreController::class,'getCourses_Student']);
Route::get('/getCourseID/{courseName}',[courseEvaluation::class,'getCourseID']);
Route::get('/getProfessorID/{courseID}',[courseEvaluation::class,'getProfessorID']);
Route::get('/getTAID/{courseID}',[courseEvaluation::class,'getTAID']);

// Endpoint for registering a new user
Route::post('/register', 'AuthController@register');

Route::get('/getAllDepartments',[ProgramPerferenceController::class,'getAllDepartments']);
Route::post('/registerPerefernces',[ProgramPerferenceController::class,'registerPerefernces']);
Route::put('/updateProfile/{id}',[ProfileController::class,'updateProfile']);
///////////////////////////////////////
//new for chat

// Route::middleware('auth:api')->group(function () {
//     // Endpoint for retrieving the list of chat users
Route::get('/students', [ChatController::class,'listStudents']);
Route::get('/professorsAndTas', [ChatController::class,'listProfessorsAndTAs']);
// Endpoint for retrieving the chat history between two users
Route::get('/history/{user1}/{user2}', [ChatController::class,'getHistory']);

// Endpoint for sending a message from one user to another
Route::post('/message', [ChatController::class,'sendMessage']);

Route::get('/receive', [ChatController::class,'receive']);
Route::get('/professorsDetails', [ChatController::class,'getProfessorDetails']);
Route::get('/TADetails', [ChatController::class,'getTADetails']);

// });
// Route::middleware('auth:api')->group(function () {
//     // Endpoint for retrieving the list of chat users
Route::get('/students', [ChatController::class,'listStudents']);
Route::get('/professorsAndTas', [ChatController::class,'listProfessorsAndTAs']);
// Endpoint for retrieving the chat history between two users
Route::get('/history/{user1}/{user2}', [ChatController::class,'getHistory']);

// Endpoint for sending a message from one user to another
Route::post('/message', [ChatController::class,'sendMessage']);

Route::get('/receive', [ChatController::class,'receive']);
Route::get('/professorsDetails', [ChatController::class,'getProfessorDetails']);
Route::get('/TADetails', [ChatController::class,'getTADetails']);

// });
// Endpoint for authenticating a user
Route::post('/login', 'AuthController@login');
Route::post('/returnType', 'AuthController@returnType');

// Endpoint for registering a new user
Route::post('/register', 'AuthController@register');

///////Professor part////////////////
Route::get('/returnProfScheudule/{professorID}', [ProfessorController::class,'returnProfScheudule']);
Route::get('/returnAllPlaces', [ProfessorController::class,'returnAllPlaces']);
Route::get('/returnPlaceScheduale/{place}', [ProfessorController::class,'returnPlaceScheduale']);
////////////TA part
Route::get('/returnTAScheudule/{TAID}', [TAController::class,'returnTAScheudule']);



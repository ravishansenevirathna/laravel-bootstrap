<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});




// Route::post('/savestudent',[StudentController::class,'savestudent'] );

Route::get('getallstudent',[StudentController::class,'getallstudent'] );

//save student form eka loadv karanawa
Route::get('savestudent',[StudentController::class,'savestudent'] );
// save student form  eka save karanawa
Route::post('savestudenttothedb',[StudentController::class,'savestudenttothedb'] );

// edit form eka load karanawa
Route::get('editstudent/{id}',[StudentController::class,'editstudent'] );
// edit form eka save karanawa
Route::post('editstudentsavedb/{id}',[StudentController::class,'editstudentsavedb'] );

Route::delete('deletestudent/{id}',[StudentController::class,'deletestudent'] );

//view student details
Route::get('getonestudent/view/{id}',[StudentController::class,'view'] )-> name('students.view');
<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::middleware('auth')->group(function(){
    Route::get('/',[\App\Http\Controllers\PageController::class, 'index']);
});

//Chat-Messages Routes
Route::middleware('auth')->group(function(){
    Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('faculties',[App\Http\Controllers\AdminController::class, 'viewFaculties']);
    Route::get('faculties/add',[App\Http\Controllers\AdminController::class, 'viewAddFaculty'])->name('add-faculty');
    Route::post('faculties/add',[App\Http\Controllers\AdminController::class, 'addNewFaculty'])->name('add-faculty');
    Route::get('faculties/edit/{id}',[App\Http\Controllers\AdminController::class, 'viewEditFaculty'])->name('update-faculty');
    Route::post('faculties/edit/{id}',[App\Http\Controllers\AdminController::class, 'updateFaculty'])->name('update-faculty');
    Route::get('users',[App\Http\Controllers\AdminController::class, 'viewUsers']);
    Route::get('users/add',[App\Http\Controllers\AdminController::class, 'viewAddUser'])->name('add-user');
    Route::post('users/add',[App\Http\Controllers\AdminController::class, 'addNewUser'])->name('add-user');
    Route::get('admin/import-faculty',[App\Http\Controllers\AdminController::class, 'viewImportFaculty'])->name('import-faculty');
    Route::post('admin/import-faculty',[App\Http\Controllers\AdminController::class, 'importFaculties'])->name('import-faculty');
    Route::get('admin/courses',[App\Http\Controllers\AdminController::class, 'viewSections'])->name('view-sections');
    Route::get('admin/import-section',[App\Http\Controllers\AdminController::class, 'viewImportSection'])->name('import-section');
    Route::post('admin/import-section',[App\Http\Controllers\AdminController::class, 'importSections'])->name('import-section');
    Route::get('admin/courses/drop/{id}',[App\Http\Controllers\AdminController::class, 'dropSection'])->name('drop-section');
   
    Route::get('admin/scheduler',[App\Http\Controllers\AdminController::class, 'viewScheduler'])->name('view-scheduler');
    Route::get('admin/getSections',[App\Http\Controllers\AdminController::class, 'getSections']);
    Route::get('admin/getCourses',[App\Http\Controllers\AdminController::class, 'getCourses']);
    Route::get('admin/getCourseInfo/{id}',[App\Http\Controllers\AdminController::class, 'getCourseInfo']);
    Route::get('admin/drag',[App\Http\Controllers\AdminController::class, 'viewDrag']);
    Route::post('admin/assignFaculty',[App\Http\Controllers\AdminController::class, 'assignFaculty']);
    Route::post('admin/removeAssignedFaculty',[App\Http\Controllers\AdminController::class, 'removeAssignedFaculty']);

    Route::get('admin/validate',[App\Http\Controllers\AdminController::class, 'viewValidate']);

    Route::get('admin/getFaculties',[App\Http\Controllers\AdminController::class, 'getFaculties']);
    Route::get('admin/getFacultyInfo/{code}',[App\Http\Controllers\AdminController::class, 'getFacultyInfo']);
    Route::get('admin/getCourseSections/{formal_code}',[App\Http\Controllers\AdminController::class, 'getCourseSections']);
   
    Route::get('admin/downloadSections',[App\Http\Controllers\AdminController::class, 'downloadSections'])->name('export');
    Route::get('admin/faculty/routine/{teacher_code}',[App\Http\Controllers\AdminController::class, 'viewFacultyRoutine'])->name('viewFacultyRoutine');

});
Route::middleware('auth','role')->group(function(){
    Route::get('faculty/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('faculty-dashboard');
    
   
});


require __DIR__.'/auth.php';

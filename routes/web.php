<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('groups.index');
});

Route::resource('groups', GroupController::class)->only([
    'index', 'create', 'store', 'show'
]);
Route::resource('students', StudentController::class);

Route::prefix('groups/{group}')->group(function() {
    Route::get('students/create', [StudentController::class, 'create'])->name('groups.students.create');
    Route::post('students', [StudentController::class, 'store'])->name('groups.students.store');
    Route::get('students/{student}', [StudentController::class, 'show'])->name('groups.students.show');
});

<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\LookupController;

use App\Http\Controllers\RelationshipController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['checkServiceSecret','serviceLang'])->group(function () {
    //general APIs
    Route::get('/check-healthy', function () {return response()->apiSuccess([],__('app.service_is_up'));});
    Route::get('/get_related_data/{model}/{id}/{relation}', [RelationshipController::class,'getRelatedData']);
    Route::get('/lookup/{model}', [LookupController::class,'getLookupData']); // model must be like gender-type or country

    Route::get('academic-years', [AcademicYearController::class, 'index']);
    Route::post('academic-years', [AcademicYearController::class, 'store']);
    Route::get('academic-years/{academic_year}', [AcademicYearController::class, 'show']);
    Route::put('academic-years/{academic_year}', [AcademicYearController::class, 'update']);


});


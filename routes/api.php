<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupDegreeController;
use App\Http\Controllers\LookupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolHubController;
use Illuminate\Support\Facades\Response;
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

    Route::get('schools', [SchoolController::class, 'index']);
    Route::post('schools', [SchoolController::class, 'store']);
    Route::get('schools/{school}', [SchoolController::class, 'show']);
    Route::put('schools/{school}', [SchoolController::class, 'update']);


});



Route::get('test',function (){
    $text = 'school-hub';
    return 'camel = '. kebabToCamel($text) .'-----  pascal= '. kebabToPascal($text);
});

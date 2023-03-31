<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\ManageDoctorController;


Route::get('/get-doctors', [App\Http\Controllers\ManageDoctorController::class, 'getAllDoctors']);
Route::get('/get-country', [App\Http\Controllers\ManageDoctorController::class, 'getCountry']);
Route::get('/get-state', [App\Http\Controllers\ManageDoctorController::class, 'getState']);
Route::get('/get-specialist', [App\Http\Controllers\ManageDoctorController::class, 'getSpecialist']);
Route::post('/check-availability', [App\Http\Controllers\ManageAppointmentController::class, 'checkAvailability']);


Route::post('/sgetave', [App\Http\Controllers\ManageDoctorController::class, 'store']);
Route::put('/update/{id}', [App\Http\Controllers\ManageDoctorController::class, 'update']);
Route::delete('/delete/{id}', [App\Http\Controllers\ManageDoctorController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', function (Request $request) {
    dd(1);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentRequestController;

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
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-citizens', [CitizenController::class, 'getCitizens']);
    Route::post('/add-citizen', [CitizenController::class, 'addCitizen']);
    Route::put('/edit-citizen/{id}', [CitizenController::class, 'editCitizen']);
    Route::delete('/delete-citizen/{id}', [CitizenController::class, 'deleteCitizen']);

    Route::get('/get-documents', [DocumentController::class, 'getDocuments']);
    Route::post('/add-document', [DocumentController::class, 'addDocument']);
    Route::put('/edit-document/{id}', [DocumentController::class, 'editDocument']);
    Route::delete('/delete-document/{id}', [DocumentController::class, 'deleteDocument']);

    Route::get('/get-requests', [DocumentRequestController::class, 'getRequests']);
    Route::post('/add-request', [DocumentRequestController::class, 'addRequest']);
    Route::put('/edit-request/{id}', [DocumentRequestController::class, 'editRequest']);
    Route::delete('/delete-request/{id}', [DocumentRequestController::class, 'deleteRequest']);
    
    Route::post('/logout', [CitizenController::class, 'logout']);
});
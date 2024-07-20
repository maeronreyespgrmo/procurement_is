<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuditTrailController;
use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//LANDING
Route::get('/', [LandingController::class, 'index']);
Route::post('/landing/table', [LandingController::class, 'table']);

Route::middleware(['auth'])->group(function () {
    //DASHBOARD
    Route::get('/home', [HomeController::class, 'index']);
    //USERS
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/table', [UserController::class, 'table']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy']);

    //PROCUREMENT ACTIVITIES
    Route::get('/procurements', [ProcurementController::class, 'index']);
    Route::post('/procurements/table', [ProcurementController::class, 'table']);
    Route::get('/procurements/create', [ProcurementController::class, 'create']);
    Route::get('/procurements/{id}/edit', [ProcurementController::class, 'edit']);
    //PROCUREMENT CRUD
    Route::post('/procurements/store', [ProcurementController::class, 'store']);
    Route::post('/procurements/{id}/update', [ProcurementController::class, 'update']);
    Route::get('/procurements/{id}/destroy', [ProcurementController::class, 'destroy']);
    Route::get('/procurements/{id}/upload_destroy', [ProcurementController::class, 'upload_destroy']);

    //ALTERNATIVE MODE ACTIVITIES
    Route::get('/procurements/alternative/', [ProcurementController::class, 'alt_index']);
    Route::get('/procurements/alternative/table', [ProcurementController::class, 'alt_table']);
    Route::get('/procurements/alternative/create', [ProcurementController::class, 'alt_create']);
    Route::get('/procurements/alternative/{id}/edit', [ProcurementController::class, 'alt_edit']);

    //CATEGORIES
    Route::get('/categories/procurements', [CategoryController::class, 'index']);
    Route::get('/categories/procurements/create', [CategoryController::class, 'create']);
    Route::get('/categories/procurements/{id}/edit', [CategoryController::class, 'edit']);
    //CATEGORIES CRUD
    Route::post('/categories/store', [CategoryController::class, 'store']);
    Route::post('/categories/{id}/update', [CategoryController::class, 'update']);
    Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy']);
    //VIEW CATEGORY ALTERNATIVE
    Route::get('/categories/alternative', [CategoryController::class, 'alt_index']);
    Route::get('/categories/alternative/create', [CategoryController::class, 'alt_create']);
    Route::get('/categories/alternative/{id}/edit', [CategoryController::class, 'alt_edit']);
    //ARCHIVES
    Route::get('/archives', [ArchiveController::class, 'index']);
    Route::post('/archives/table', [ArchiveController::class, 'table']);
    Route::get('/archives/{id}/show', [ArchiveController::class, 'show']);
    Route::get('/archives/{id}/restore', [ArchiveController::class, 'restore']);
    //ARCHIVES - PROCUREMENT
    Route::get('/archives/procurements', [ArchiveController::class, 'index_procurement']);
    Route::post('/archives/procurements/table', [ArchiveController::class, 'table_procurement']);
    Route::get('/archives/procurements/{id}/show', [ArchiveController::class, 'show_procurement']);
    Route::get('/archives/procurements/{id}/restore', [ArchiveController::class, 'restore_procurement']);
    //ARCHIVES - ALTERNATIVE MODE PROCUREMENT
    Route::get('/archives/procurements/alternative', [ArchiveController::class, 'index_alternative']);
    Route::post('/archives/procurements/alternative/table', [ArchiveController::class, 'table_alternative']);
    Route::get('/archives/procurements/alternative/{id}/show', [ArchiveController::class, 'show_alternative']);
    Route::get('/archives/procurements/alternative/{id}/restore', [ArchiveController::class, 'restore_alternative']);
    //AUDIT TRAILS
    Route::get('/audit_trails', [AuditTrailController::class, 'index']);
    Route::post('/audit_trails/table', [AuditTrailController::class, 'table']);
});

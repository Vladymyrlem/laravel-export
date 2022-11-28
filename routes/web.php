<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use \App\Http\Controllers\CompaniesController;
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

Route::get('/', [ExportController::class, 'import'])->name('home');
Route::get('/open', [ExportController::class, 'index']);
Route::get('/import', [ExportController::class, 'importcsv']);
Route::get('file-import-export', [ExportController::class, 'fileImportExport']);
Route::post('file-import', [ExportController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ExportController::class, 'fileExport'])->name('file-export');
Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');

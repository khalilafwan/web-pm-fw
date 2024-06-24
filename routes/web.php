<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataKonsesiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataMonitoringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk melihat Dashboard
Route::get('/', [ChartController::class, 'index'])->middleware('auth');

// Route untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk melakukan proses login
Route::post('/login', [LoginController::class, 'login']);

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk melihat Tabel Konsesi
Route::get('/tables-konsesi', [DataKonsesiController::class, 'index'])->name('datakonsesi.index')->middleware('auth');

// Route untuk melihat Tabel Monitoring dan Chart pada Dashboard
Route::get('/tables-monitoring', [DataMonitoringController::class, 'index'])->name('datamonitoring.index')->middleware('auth');
Route::get('/chart/getData', [ChartController::class, 'getData'])->name('chart.getData')->middleware('auth');
Route::get('/chart/getDataPieChart', [ChartController::class, 'getDataPieChart'])->name('chart.getDataPieChart')->middleware('auth');

// Route untuk input Data Konsesi
Route::get('/form-konsesi', [DataKonsesiController::class, 'create'])->name('datakonsesi.create');
Route::post('/form-konsesi', [DataKonsesiController::class, 'store'])->name('datakonsesi.store');

// Route untuk input Data Project
Route::get('/form-project', [DataMonitoringController::class, 'create'])->name('datamonitoring.create');
Route::post('/form-project', [DataMonitoringController::class, 'store'])->name('datamonitoring.store');

// Route untuk import Data Project

Route::get('/import-project', function () {
    return view('import-project', [
        "title" => "Import Project"
    ]);
})->middleware('auth');

// Rute untuk form design
Route::get('/form-design', [DataMonitoringController::class, 'edit'])->name('dataMonitoring.edit')->defaults('formType', 'design');

// Rute untuk form nesting
Route::get('/form-nesting', [DataMonitoringController::class, 'edit'])->name('form.nesting')->defaults('formType', 'nesting');

// Rute untuk form program
Route::get('/form-program', [DataMonitoringController::class, 'edit'])->name('form.program')->defaults('formType', 'program');

// Rute untuk form checker
Route::get('/form-checker', [DataMonitoringController::class, 'edit'])->name('form.checker')->defaults('formType', 'checker');

// Rute untuk mengupdate data monitoring (PUT)
Route::put(`/dataMonitoring/{dataMonitoring}/{formType}`, [DataMonitoringController::class, 'update'])->name('dataMonitoring.update');
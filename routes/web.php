<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\FastExcelController;
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

// Route untuk melihat Tabel User
Route::get('/tables-user', [DataUserController::class, 'index'])->name('datauser.index')->middleware('auth');

// Route untuk melihat Detail User
Route::get('/detail-user', [DataUserController::class, 'showAccountDetails'])
    ->name('account.details')
    ->middleware('auth');

// Route untuk melihat Tabel Konsesi
Route::get('/tables-konsesi', [DataKonsesiController::class, 'index'])->name('datakonsesi.index')->middleware('auth');

// Route untuk melihat Tabel Monitoring dan Chart pada Dashboard
Route::get('/tables-monitoring', [DataMonitoringController::class, 'index'])->name('dataMonitoring.index')->middleware('auth');
Route::get('/chart/getData', [ChartController::class, 'getData'])->name('chart.getData')->middleware('auth');
Route::get('/chart/getDataPieChart', [ChartController::class, 'getDataPieChart'])->name('chart.getDataPieChart')->middleware('auth');

// Route untuk input Data Konsesi
Route::get('/form-konsesi', [DataKonsesiController::class, 'create'])->name('datakonsesi.create')->middleware('auth');
Route::post('/form-konsesi', [DataKonsesiController::class, 'store'])->name('datakonsesi.store')->middleware('auth');

// Route untuk input Data Project
Route::get('/form-project', [DataMonitoringController::class, 'create'])->name('datamonitoring.create')->middleware('auth');
Route::post('/form-project', [DataMonitoringController::class, 'store'])->name('datamonitoring.store')->middleware('auth');

// Route untuk import Data Project

Route::get('/import-project', function () {
    return view('import-project', [
        "title" => "Import Project"
    ]);
})->middleware('auth');
Route::post('/import-project', [FastExcelController::class, 'import'])->middleware('auth');

// Rute untuk form design
Route::get('/form-design', [DataMonitoringController::class, 'edit'])->name('dataMonitoring.edit')->defaults('formType', 'design')->middleware('auth');

// Rute untuk form nesting
Route::get('/form-nesting', [DataMonitoringController::class, 'edit'])->name('form.nesting')->defaults('formType', 'nesting')->middleware('auth');

// Rute untuk form program
Route::get('/form-program', [DataMonitoringController::class, 'edit'])->name('form.program')->defaults('formType', 'program')->middleware('auth');

// Rute untuk form checker
Route::get('/form-checker', [DataMonitoringController::class, 'edit'])->name('form.checker')->defaults('formType', 'checker')->middleware('auth');

// Rute untuk mengupdate data monitoring (PUT)
Route::put(`/dataMonitoring/{dataMonitoring}/{formType}/`, [DataMonitoringController::class, 'update'])->name('dataMonitoring.update')->middleware('auth');

// Rute untuk menghapus data monitoring (DELETE)
Route::delete('/dataMonitoring/{id}', [DataMonitoringController::class, 'destroy'])->name('dataMonitoring.destroy')->middleware('auth');
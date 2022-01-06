<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('timeline-penerimaan', [HomeController::class, 'timeline'])->name('timeline');
Route::get('persyaratan-umum', [HomeController::class, 'persyaratan'])->name('persyaratan');
Route::get('masuk-akun-pelamar', [AuthController::class, 'userLogin'])->name('user-login');

Route::get('daftar-akun-pelamar', [AuthController::class, 'userRegister'])->name('user-register');
Route::post('daftar-akun-pelamar', [AuthController::class, 'storeRegister'])->name('store-register');

Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin-schedule', [ScheduleController::class, 'index'])->name('admin-timeline');
    Route::post('set-schedule/{id}', [ScheduleController::class, 'setSchedule'])->name('set-schedule');

    // user
    Route::get('form-pendaftaran-pelamar/{id}', [HomeController::class, 'formPendaftaran'])->name('form-pendaftaran');
    Route::post('form-pendaftaran-pelamar', [HomeController::class, 'storePendaftaran'])->name('store-pendaftaran');
});


require __DIR__.'/auth.php';

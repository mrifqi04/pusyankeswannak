<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PelamarController;
use App\Http\Controllers\Backend\InputTestController;
use App\Http\Controllers\Backend\LaporanController;

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
    // ADMIN
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin-schedule', [ScheduleController::class, 'index'])->name('admin-timeline');
    Route::post('set-schedule/{id}', [ScheduleController::class, 'setSchedule'])->name('set-schedule');
    
    // cetak laporan index
    Route::get('cetak-laporan', [LaporanController::class, 'index'])->name('cetak-laporan');
    Route::post('export-laporan', [LaporanController::class, 'export'])->name('export-laporan');

    Route::get('data-pelamar', [PelamarController::class, 'index'])->name('data-pelamar');
    Route::get('detail-pelamar/{id}', [PelamarController::class, 'detail'])->name('detail-pelamar');
    Route::post('accept-pelamar/{id}', [PelamarController::class, 'accept'])->name('accept-pelamar');
    Route::post('reject-pelamar/{id}', [PelamarController::class, 'reject'])->name('reject-pelamar');

    // input nilai minimal
    Route::get('input-nilai-min', [InputTestController::class, 'inputMinNilai'])->name('input-nilai-minimal');
    Route::post('input-nilai-min', [InputTestController::class, 'storeMinNilai'])->name('store-nilai-minimal');

    // update jumlah kuota posisi
    Route::get('update-kuota-posisi', [InputTestController::class, 'inputKuotaPosisi'])->name('update-kuota-posisi');
    Route::post('store-kuota-posisi', [InputTestController::class, 'storeKuotaPosisi'])->name('store-kuota-posisi');

    Route::get('input-tes-tertulis', [InputTestController::class, 'inputTestTertulis'])->name('input-tes-tertulis');
    Route::post('input-tes-tertulis', [InputTestController::class, 'storeTestTertulis'])->name('store-tes-tertulis');

    Route::get('input-tes-wawancara', [InputTestController::class, 'inputTestWawancara'])->name('input-tes-wawancara');
    Route::post('input-tes-wawancara', [InputTestController::class, 'storeTestWawancara'])->name('store-tes-wawancara');

    Route::get('input-tes-praktik', [InputTestController::class, 'inputTestPraktik'])->name('input-tes-praktik');
    Route::post('input-tes-praktik', [InputTestController::class, 'storeTestPraktik'])->name('store-tes-praktik');

    // user
    Route::get('form-pendaftaran-pelamar/{id}', [HomeController::class, 'formPendaftaran'])->name('form-pendaftaran');
    Route::post('form-pendaftaran-pelamar', [HomeController::class, 'storePendaftaran'])->name('store-pendaftaran');    
});


require __DIR__.'/auth.php';

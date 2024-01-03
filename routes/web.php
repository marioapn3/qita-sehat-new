<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dokter\DetailPeriksaController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaController;
use App\Http\Controllers\Pasien\DaftarPoliController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


//logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('ubah-sandi', [ProfileController::class, 'changePassword'])->name('ubah-sandi');

Route::controller(LoginController::class)->name('login.')->group(function () {
    Route::get('login/admin', 'admin')->name('admin');
    Route::get('login/dokter', 'dokter')->name('dokter');
    Route::get('login/pasien', 'pasien')->name('pasien');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('index');

    Route::controller(ObatController::class)->name('obat.')->group(function () {
        Route::get('obat', 'index')->name('index');
        Route::get('obat/create', 'create')->name('create');
        Route::post('obat/store', 'store')->name('store');
        Route::get('obat/edit/{id}', 'edit')->name('edit');
        Route::post('obat/update/{id}', 'update')->name('update');
        Route::delete('obat/destroy', 'destroy')->name('destroy');
    });

    Route::controller(PoliController::class)->name('poli.')->group(function () {
        Route::get('poli', 'index')->name('index');
        Route::get('poli/create', 'create')->name('create');
        Route::post('poli/store', 'store')->name('store');
        Route::get('poli/edit/{id}', 'edit')->name('edit');
        Route::post('poli/update/{id}', 'update')->name('update');
        Route::delete('poli/destroy', 'destroy')->name('destroy');
    });

    Route::controller(DokterController::class)->name('dokter.')->group(function () {
        Route::get('dokter', 'index')->name('index');
        Route::get('dokter/create', 'create')->name('create');
        Route::post('dokter/store', 'store')->name('store');
        Route::get('dokter/edit/{id}', 'edit')->name('edit');
        Route::post('dokter/update/{id}', 'update')->name('update');
        Route::delete('dokter/destroy', 'destroy')->name('destroy');
    });

    Route::controller(PasienController::class)->name('pasien.')->group(function () {
        Route::get('pasien', 'index')->name('index');
        Route::get('pasien/create', 'create')->name('create');
        Route::post('pasien/store', 'store')->name('store');
        Route::get('pasien/edit/{id}', 'edit')->name('edit');
        Route::post('pasien/update/{id}', 'update')->name('update');
        Route::delete('pasien/destroy', 'destroy')->name('destroy');
    });
});

Route::prefix('dokter')->name('dokter.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dokter'])->name('index');
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'profil_dokter')->name('profile');
        Route::get('profile/edit', 'edit_dokter')->name('profile.edit');
        Route::post('profile/store', 'update_dokter')->name('profile.store');
    });
    Route::controller(JadwalPeriksaController::class)->name('jadwal-periksa.')->group(function () {
        Route::get('jadwal-periksa', 'index')->name('index');
        Route::get('jadwal-periksa/create', 'create')->name('create');
        Route::post('jadwal-periksa/store', 'store')->name('store');
        Route::get('jadwal-periksa/edit/{id}', 'edit')->name('edit');
        Route::post('jadwal-periksa/update/{id}', 'update')->name('update');
        Route::delete('jadwal-periksa/destroy', 'destroy')->name('destroy');
    });
    Route::controller(PeriksaController::class)->name('periksa-pasien.')->group(function () {
        Route::get('periksa-pasien', 'index')->name('index');
        Route::get('periksa-pasien/create/{id}', 'create')->name('create');
        Route::post('periksa-pasien/store', 'store')->name('store');
        // Route::get('/getDoktersByPoli/{id_poli}', 'getDoktersByPoli');
        // Route::post('daftar-poli/store', 'store')->name('store');
    });

    Route::controller(DetailPeriksaController::class)->name('riwayat-pasien.')->group(function () {
        Route::get('riwayat-pasien', 'index')->name('index');
        Route::get('riwayat-pasien/detail/{id}', 'detail')->name('detail');
    });
});

Route::prefix('pasien')->name('pasien.')->group(function () {
    Route::controller(RegisterController::class)->name('register.')->group(function () {
        Route::get('register', 'index')->name('index');
        Route::post('register/store', 'store')->name('store');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'profil_pasien')->name('profile');
        Route::get('profile/edit', 'edit_pasien')->name('profile.edit');
        Route::post('profile/store', 'update_pasien')->name('profile.store');
    });

    Route::get('/', [DashboardController::class, 'pasien'])->name('index');

    Route::controller(DaftarPoliController::class)->name('daftar-poli.')->group(function () {
        Route::get('daftar-poli', 'index')->name('index');
        Route::get('/getDoktersByPoli/{id_poli}', 'getDoktersByPoli');
        Route::post('daftar-poli/store', 'store')->name('store');
    });
});

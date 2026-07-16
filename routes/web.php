<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\EkstrakurikulerController;

/*
|--------------------------------------------------------------------------
| FRONTEND WEBSITE (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/
Route::get('/semua-berita', [FrontendController::class, 'beritaIndex'])
    ->name('frontend.berita.index');

Route::get('/semua-berita/{id}', [FrontendController::class, 'beritaDetail'])
    ->name('frontend.berita.detail');

/*
|--------------------------------------------------------------------------
| Guru & Staf
|--------------------------------------------------------------------------
*/
Route::get('/guru-staf', [FrontendController::class, 'guruIndex'])
    ->name('frontend.guru.index');

/*
|--------------------------------------------------------------------------
| Kontak
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [FrontendController::class, 'kontak'])
    ->name('frontend.kontak');

/*
|--------------------------------------------------------------------------
| PPDB
|--------------------------------------------------------------------------
*/
Route::get('/ppdb', [FrontendController::class, 'ppdb'])
    ->name('frontend.ppdb');

/*
|--------------------------------------------------------------------------
| Profil Sekolah
|--------------------------------------------------------------------------
*/
Route::get('/profil/sejarah', [FrontendController::class, 'sejarah'])
    ->name('frontend.sejarah');

Route::get('/profil/ekstrakurikuler', [FrontendController::class, 'ekstrakurikuler'])
    ->name('frontend.ekstrakurikuler');

Route::get('/profil/ekstrakurikuler/{id}', [FrontendController::class, 'detailEkstrakurikuler'])
    ->name('frontend.ekstrakurikuler.detail');

Route::get('/profil/visi-misi', [VisiMisiController::class, 'showGuest'])
    ->name('frontend.visimisi');

Route::get('/profil/struktur-organisasi', [FrontendController::class, 'struktur'])
    ->name('frontend.struktur');

Route::get('/profil/akreditasi', [AkreditasiController::class, 'showGuest'])
    ->name('frontend.akreditasi');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile Laravel Breeze
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Berita & Guru
    |--------------------------------------------------------------------------
    */
    Route::resource('berita', BeritaController::class);
    Route::resource('guru', GuruController::class);

    /*
    |--------------------------------------------------------------------------
    | Kepala Sekolah
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kepala-sekolah', [KepalaSekolahController::class, 'index'])
        ->name('kepala-sekolah.index');

    Route::post('/admin/kepala-sekolah', [KepalaSekolahController::class, 'update'])
        ->name('kepala-sekolah.update');

    /*
    |--------------------------------------------------------------------------
    | Manajemen Profil
    |--------------------------------------------------------------------------
    */

    // Sejarah
    Route::get('/admin/profil/sejarah', [SejarahController::class, 'index'])
        ->name('sejarah.index');

    Route::post('/admin/profil/sejarah', [SejarahController::class, 'update'])
        ->name('sejarah.update');

    // Visi Misi
    Route::get('/admin/profil/visi-misi', [VisiMisiController::class, 'index'])
        ->name('visi-misi.index');

    Route::post('/admin/profil/visi-misi', [VisiMisiController::class, 'update'])
        ->name('visi-misi.update');

    // Struktur Organisasi
    Route::get('/admin/profil/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])
        ->name('struktur-organisasi.index');

    Route::post('/admin/profil/struktur-organisasi', [StrukturOrganisasiController::class, 'update'])
        ->name('struktur-organisasi.update');

    /*
    |--------------------------------------------------------------------------
    | Ekstrakurikuler
    |--------------------------------------------------------------------------
    */
    Route::resource(
        '/admin/ekstrakurikuler',
        EkstrakurikulerController::class
    )->names('ekstrakurikuler');

    /*
    |--------------------------------------------------------------------------
    | Akreditasi
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/akreditasi', [AkreditasiController::class, 'index'])
        ->name('akreditasi.index');

    Route::post('/admin/akreditasi/update', [AkreditasiController::class, 'update'])
        ->name('akreditasi.update');

    /*
    |--------------------------------------------------------------------------
    | PPDB
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/ppdb', [PpdbController::class, 'index'])
        ->name('ppdb.index');

    Route::post('/admin/ppdb', [PpdbController::class, 'update'])
        ->name('ppdb.update');
});

require __DIR__.'/auth.php';
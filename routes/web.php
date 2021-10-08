<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TAController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NilaiTAController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SemhasTAController;
use App\Http\Controllers\SempropTAController;
use App\Http\Controllers\PendadaranController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\KonsultasiTAController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\NilaiPendadaranController;

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


// ROUTE GUEST
Route::get('/', function () {
    return view('guest.login');
});
Route::get('/guest/menu', function () {
    return view('guest.menu');
});
Route::get('/error', function () {
    return view('guest.error-page');
});

//================= DASHBOARD ====================

//=============== ROUTE ADMIN ====================
Route::get('/admin/beranda', [BerandaAdminController::class, 'index']);

// Route Tahun Akademik
Route::post('/admin/tahun-akademik/store', [TahunAkademikController::class, 'store'])->name('tahunAkademik.store');
Route::get('/admin/tahun-akademik/edit/{id}', [TahunAkademikController::class, 'edit'])->name('tahunAkademik.edit');
Route::put('/admin/tahun-akademik/update/{id}', [TahunAkademikController::class, 'update'])->name('tahunAkademik.update');
Route::get('/admin/tahun-akademik/destroy/{id}', [TahunAkademikController::class, 'destroy'])->name('tahunAkademik.destroy');
Route::get('/admin/tahun-akademik', [TahunAkademikController::class, 'index']);

// Route Berita
Route::get('/admin/berita', [BeritaController::class, 'index']);

// Route Jurusan
Route::get('/admin/jurusan', [JurusanController::class, 'index']);
Route::post('/admin/jurusan/store', [JurusanController::class, 'store']);
Route::get('/admin/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/admin/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::get('/admin/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

// Route Data Ruangan
Route::get('/admin/data-ruang', [RuangController::class, 'index']);
Route::post('/admin/data-ruang/store', [RuangController::class, 'store'])->name('ruang.store');
Route::put('/admin/data-ruang/update/{id}', [RuangController::class, 'update'])->name('ruang.update');
Route::get('/admin/data-ruang/destroy/{id}', [RuangController::class, 'destroy'])->name('ruang.destroy');

//Route Data User
Route::get('/admin/data-user', [UserController::class, 'index']);

//Route Data Dosen
Route::get('/admin/data-dosen', [DosenController::class, 'index']);

//Route Data Komisi
Route::get('/admin/data-komisi', [KomisiController::class, 'index']);

//Tugas Akhir
//data TA
Route::get('/tugas-akhir/data-TA', [TAController::class, 'index'])->name('TA.index');
Route::get('/tugas-akhir/detail-TA/{id}', [TAController::class, 'show'])->name('TA.show');
//data Konsul
Route::get('/tugas-akhir/data-konsultasi', [KonsultasiTAController::class, 'index'])->name('konsultasi.index');
Route::get('/tugas-akhir/data-konsultasi/{id}', [KonsultasiTAController::class, 'show'])->name('konsultasi.show');
//semprop
Route::get('/tugas-akhir/semprop', [SempropTAController::class, 'index']);
//semhas
Route::get('/tugas-akhir/semhas', [SemhasTAController::class, 'index']);
//spk
Route::get('/tugas-akhir/spk', [SPKController::class, 'index'])->name('spk.index');
Route::post('/tugas-akhir/spk/store', [SPKController::class, 'store'])->name('spk.store');
Route::put('/tugas-akhir/spk/update/{id}', [SPKController::class, 'update'])->name('spk.update');
Route::get('/tugas-akhir/spk/destroy/{id}', [SPKController::class, 'destroy'])->name('spk.destroy');
//nilai TA
Route::get('/tugas-akhir/nilaita', [NilaiTAController::class, 'index'])->name('nilaita.index');
Route::post('/tugas-akhir/nilaita/store', [NilaiTAController::class, 'store'])->name('nilaita.store');
Route::put('/tugas-akhir/nilaita/update/{id}', [NilaiTAController::class, 'update'])->name('nilaita.update');
Route::get('/tugas-akhir/nilaita/destroy/{id}', [NilaiTAController::class, 'destroy'])->name('nilaita.destroy');


//Pendadaran
//data pendadaran
Route::get('pendadaran/data-pendadaran', [PendadaranController::class, 'index'])->name('pendadaran.index');
Route::get('pendadaran/nilai-pendadaran', [NilaiPendadaranController::class, 'index'])->name('nilaiPendadaran.index');


Route::get('/admin/pendadaran/pengajuan', function () {
    return view('admin.pendadaran.pengajuan');
});
Route::get('/admin/pendadaran/surat-tugas', function () {
    return view('admin.pendadaran.surattugas');
});
Route::get('/admin/pendadaran/nilai', function () {
    return view('admin.pendadaran.datanilai');
});
//yudisium
Route::get('/admin/yudisium/data-yudisium', function () {
    return view('admin.yudisium.datayudisium');
});
Route::get('/admin/yudisium/undangan', function () {
    return view('admin.yudisium.undangan');
});
Route::get('/admin/yudisium/pengajuan', function () {
    return view('admin.yudisium.pengajuan');
});
Route::get('/admin/yudisium/jadwal', function () {
    return view('admin.yudisium.jadwal');
});
Route::get('/admin/yudisium/upload-sk', function () {
    return view('admin.yudisium.uploadSK');
});



//================= ROUTE KOMISI ====================
Route::get('/komisi/beranda', function () {
    return view('komisi.master.beranda');
});
Route::get('/komisi/data-mahasiswa', function () {
    return view('komisi.master.datamahasiswa');
});
Route::get('/komisi/data-dosen', function () {
    return view('komisi.master.datadosen');
});
//Tugas Akhir
Route::get('/komisi/tugas-akhir/data-TA', function () {
    return view('komisi.TA.dataTA');
});
Route::get('/komisi/tugas-akhir/dosen-pembimbing', function () {
    return view('komisi.TA.dosbing');
});
Route::get('/komisi/tugas-akhir/pengajuan', function () {
    return view('komisi.TA.pengajuan');
});
Route::get('/komisi/tugas-akhir/detail-pengajuan', function () {
    return view('komisi.TA.detailpengajuan');
});
Route::get('/komisi/tugas-akhir/nilai', function () {
    return view('komisi.TA.dosbing');
});
//Pendadaran
Route::get('/komisi/pendadaran/data-pendadaran', function () {
    return view('komisi.pendadaran.datapendadaran');
});
Route::get('/komisi/pendadaran/jadwal-pendadaran', function () {
    return view('komisi.pendadaran.jadwal');
});
Route::get('/komisi/pendadaran/pengajuan', function () {
    return view('komisi.pendadaran.pengajuan');
});
Route::get('/komisi/pendadaran/detail-pengajuan', function () {
    return view('komisi.pendadaran.detailpengajuan');
});
Route::get('/komisi/pendadaran/nilai', function () {
    return view('komisi.pendadaran.datanilai');
});



//================= ROUTE DOSEN ===========================
Route::get('/dosen/beranda', function () {
    return view('dosen.beranda');
});
//Tugas Akhir
Route::get('/dosen/tugas-akhir/data-TA', function () {
    return view('dosen.TA.datamahasiswa');
});
Route::get('/dosen/tugas-akhir/data-konsultasi', function () {
    return view('dosen.TA.datakonsultasi');
});
Route::get('/dosen/tugas-akhir/detail-konsultasi', function () {
    return view('dosen.TA.detailkonsultasi');
});
Route::get('/dosen/tugas-akhir/upload-nilai', function () {
    return view('dosen.TA.uploadnilai');
});
//pendadaran
Route::get('/dosen/pendadaran/data-pendadaran', function () {
    return view('dosen.pendadaran.datapendadaran');
});
Route::get('/dosen/pendadaran/jadwal', function () {
    return view('dosen.pendadaran.jadwal');
});
Route::get('/dosen/pendadaran/upload-nilai', function () {
    return view('dosen.pendadaran.uploadnilai');
});

//================= ROUTE MAHASISWA =========================
//Tugas Akhir
Route::get('/mahasiswa/tugas-akhir/beranda', function () {
    return view('mahasiswa.TA.pages.beranda');
});
Route::get('/mahasiswa/tugas-akhir/proposal', function () {
    return view('mahasiswa.TA.pages.proposal');
});
Route::get('/mahasiswa/tugas-akhir/konsultasi', function () {
    return view('mahasiswa.TA.pages.konsultasi');
});
Route::get('/mahasiswa/tugas-akhir/seminar', function () {
    return view('mahasiswa.TA.pages.seminar');
});
Route::get('/mahasiswa/tugas-akhir/nilai', function () {
    return view('mahasiswa.TA.pages.nilai');
});
Route::get('/mahasiswa/tugas-akhir/distribusi', function () {
    return view('mahasiswa.TA.pages.distribusi');
});

//Pendadaran
Route::get('/mahasiswa/pendadaran/beranda', function () {
    return view('mahasiswa.pendadaran.pages.beranda');
});
Route::get('/mahasiswa/pendadaran/pendaftaran', function () {
    return view('mahasiswa.pendadaran.pages.pendaftaran');
});
Route::get('/mahasiswa/pendadaran/jadwal', function () {
    return view('mahasiswa.pendadaran.pages.jadwal');
});
Route::get('/mahasiswa/pendadaran/nilai', function () {
    return view('mahasiswa.pendadaran.pages.nilai');
});

//Yudisium
Route::get('/mahasiswa/yudisium/beranda', function () {
    return view('mahasiswa.yudisium.pages.beranda');
});
Route::get('/mahasiswa/yudisium/pendaftaran', function () {
    return view('mahasiswa.yudisium.pages.pendaftaran');
});
Route::get('/mahasiswa/yudisium/jadwal', function () {
    return view('mahasiswa.yudisium.pages.jadwal');
});

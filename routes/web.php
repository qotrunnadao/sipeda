<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\BerandaAdminController;
use App\Http\Controllers\TahunAkademikController;

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
Route::get('/admin/tahun-akademik', [TahunAkademikController::class, 'index']);
Route::get('/admin/berita', [BeritaController::class, 'index']);
Route::get('/admin/jurusan', [JurusanController::class, 'index']);
Route::get('/admin/data-ruang', [RuangController::class, 'index']);
Route::get('/admin/data-user', [UserController::class, 'index']);
Route::get('/admin/data-dosen', [DosenController::class, 'index']);
Route::get('/admin/data-komisi', [KomisiController::class, 'index']);

//Tugas Akhir
Route::get('/admin/tugas-akhir/data-TA', function () {
    return view('admin.TA.dataTA');
});
Route::get('/admin/tugas-akhir/data-konsultasi', function () {
    return view('admin.TA.datakonsultasi');
});
Route::get('/admin/tugas-akhir/data-seminar', function () {
    return view('admin.TA.dataseminar');
});
Route::get('/admin/tugas-akhir/pengajuan', function () {
    return view('admin.TA.pengajuanproposal');
});
Route::get('/admin/tugas-akhir/spk', function () {
    return view('admin.TA.uploadSPK');
});
Route::get('/admin/tugas-akhir/pengajuan-seminar', function () {
    return view('admin.TA.pengajuanseminar');
});
Route::get('/admin/tugas-akhir/berita-acara', function () {
    return view('admin.TA.beritaacara');
});
Route::get('/admin/tugas-akhir/nilai', function () {
    return view('admin.TA.datanilai');
});
//Pendadaran
Route::get('/admin/pendadaran/data-pendadaran', function () {
    return view('admin.pendadaran.datapendadaran');
});
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

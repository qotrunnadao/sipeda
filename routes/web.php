<?php

use App\Http\Controllers\SeminarController;
use Illuminate\Support\Facades\Route;

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

// ================= TUGAS AKHIR ======================
//ROUTE ADMIN
Route::get('/TA/admin/beranda', function () {
    return view('TA.admin.beranda');
});
Route::get('/TA/admin/datadosen', function () {
    return view('TA.admin.datadosen');
});
Route::get('/TA/admin/datakomisi', function () {
    return view('TA.admin.datakomisi');
});
Route::get('/TA/admin/pengajuanproposal', function () {
    return view('TA.admin.pengajuanproposal');
});
Route::get('/TA/admin/uploadspk', function () {
    return view('TA.admin.uploadSPK');
});
Route::get('/TA/admin/pengajuanseminar', function () {
    return view('TA.admin.pengajuanseminar');
});
Route::get('/TA/admin/beritaacara', function () {
    return view('TA.admin.beritaacara');
});
Route::get('/TA/admin/datanilai', function () {
    return view('TA.admin.datanilai');
});

// ROUTE MAHASISWA
Route::get('/TA/mahasiswa/beranda', function () {
    return view('TA.mahasiswa.beranda');
});
Route::get('/TA/mahasiswa/proposal', function () {
    return view('TA.mahasiswa.proposal');
});
Route::get('/TA/mahasiswa/konsultasi', function () {
    return view('TA.mahasiswa.konsultasi');
});
Route::get('/TA/mahasiswa/seminar', function () {
    return view('TA.mahasiswa.seminar');
});
Route::get('/TA/mahasiswa/distribusi', function () {
    return view('TA.mahasiswa.distribusi');
});
Route::get('/TA/mahasiswa/nilai', function () {
    return view('TA.mahasiswa.nilai');
});

// ROUTE KOMISI
Route::get('/TA/komisi/beranda', function () {
    return view('TA.komisi.beranda');
});
Route::get('/TA/komisi/datamahasiswa', function () {
    return view('TA.komisi.datamahasiswa');
});
Route::get('/TA/komisi/detailmahasiswa', function () {
    return view('TA.komisi.detailmahasiswa');
});
Route::get('/TA/komisi/datadosen', function () {
    return view('TA.komisi.datadosen');
});
Route::get('/TA/komisi/datanilai', function () {
    return view('TA.komisi.datanilai');
});

// ROUTE DOSEN
Route::get('/TA/dosen/beranda', function () {
    return view('TA.dosen.beranda');
});
Route::get('/TA/dosen/datamahasiswa', function () {
    return view('TA.dosen.datamahasiswa');
});
Route::get('/TA/dosen/datakonsultasi', function () {
    return view('TA.dosen.datakonsultasi');
});
Route::get('/TA/dosen/detailkonsultasi', function () {
    return view('TA.dosen.detailkonsultasi');
});
Route::get('/TA/dosen/uploadnilai', function () {
    return view('TA.dosen.uploadnilai');
});

// ================= PENDADARAN ======================
//ROUTE MAHASISWA
Route::get('/pendadaran/mahasiswa/beranda', function () {
    return view('pendadaran.mahasiswa.beranda');
});
Route::get('/pendadaran/mahasiswa/pendaftaran', function () {
    return view('pendadaran.mahasiswa.pendaftaran');
});
Route::get('/pendadaran/mahasiswa/nilai', function () {
    return view('pendadaran.mahasiswa.nilai');
});

//ROUTE ADMIN
Route::get('/pendadaran/admin/beranda', function () {
    return view('pendadaran.admin.beranda');
});
Route::get('/pendadaran/admin/datamahasiswa', function () {
    return view('pendadaran.admin.datamahasiswa');
});
Route::get('/pendadaran/admin/detailmahasiswa', function () {
    return view('pendadaran.admin.detailmahasiswa');
});
Route::get('pendadaran/admin/uploadsurat', function () {
    return view('pendadaran.admin.uploadsurat');
});
Route::get('/pendadaran/admin/datanilai', function () {
    return view('pendadaran.admin.datanilai');
});

//ROUTE KOMISI
Route::get('/pendadaran/komisi/beranda', function () {
    return view('pendadaran.komisi.beranda');
});
Route::get('/pendadaran/komisi/datamahasiswa', function () {
    return view('pendadaran.komisi.datamahasiswa');
});
Route::get('/pendadaran/komisi/detailmahasiswa', function () {
    return view('pendadaran.komisi.detailmahasiswa');
});
Route::get('/pendadaran/komisi/datanilai', function () {
    return view('pendadaran.komisi.datanilai');
});
Route::get('/pendadaran/komisi/jadwal', function () {
    return view('pendadaran.komisi.jadwal');
});
//ROUTE DOSEN
Route::get('/pendadaran/dosen/beranda', function () {
    return view('pendadaran.dosen.beranda');
});
Route::get('/pendadaran/dosen/jadwal', function () {
    return view('pendadaran.dosen.jadwal');
});
Route::get('/pendadaran/dosen/uploadnilai', function () {
    return view('pendadaran.dosen.uploadnilai');
});

// ================= YUDISIUM ======================
// ROUTE ADMIM
Route::get('/yudisium/admin/beranda', function () {
    return view('yudisium.admin.beranda');
});
Route::get('yudisium/admin/pengajuan', function () {
    return view('yudisium.admin.pengajuan');
});
Route::get('yudisium/admin/jadwal', function () {
    return view('yudisium.admin.jadwal');
});
Route::get('yudisium/admin/upload-sk', function () {
    return view('yudisium.admin.uploadSK');
});

//ROUTE MAHASISWA
Route::get('/yudisium/mahasiswa/beranda', function () {
    return view('yudisium.mahasiswa.beranda');
});
Route::get('yudisium/mahasiswa/pendaftaran', function () {
    return view('yudisium.mahasiswa.pendaftaran');
});

//ROUTE KOMISI
Route::get('/yudisium/komisi/beranda', function () {
    return view('yudisium.komisi.beranda');
});
Route::get('/yudisium/komisi/jadwal', function () {
    return view('yudisium.komisi.jadwal');
});

//ROUTE DOSEN
Route::get('/yudisium/dosen/beranda', function () {
    return view('yudisium.dosen.beranda');
});
Route::get('/yudisium/dosen/jadwal', function () {
    return view('yudisium.dosen.jadwal');
});


//BACKUP
Route::get('/admin', function () {
    return view('admin.layouts.main');
});
Route::get('/komisi', function () {
    return view('komisi.layouts.main');
});
Route::get('/dosen', function () {
    return view('dosen.layouts.main');
});

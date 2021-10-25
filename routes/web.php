<?php

use App\Http\Middleware\Dosen;
use App\Http\Middleware\Komisi;
use App\Http\Middleware\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SKController;
use App\Http\Controllers\TAController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NilaiTAController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\StatusTAController;
use App\Http\Controllers\YudisiumController;
use App\Http\Controllers\PendadaranController;
use App\Http\Controllers\KonsultasiTAController;
use App\Http\Controllers\SeminarHasilController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\StatusYudisiumController;
use App\Http\Controllers\NilaiPendadaranController;
use App\Http\Controllers\SeminarProposalController;
use App\Http\Controllers\StatusPendadaranController;
use App\Http\Controllers\BeritaAcaraPendadaranController;
use App\Http\Middleware\Kajur;

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

Auth::routes();
// ROUTE GUEST
Route::get('/', function () {
    return view('guest.login');
});
Route::get('/error', function () {
    return view('guest.error-page');
});

//=============== ROUTE ADMIN ====================
Route::get('/admin/beranda', [BerandaController::class, 'index'])->name('admin.route')->middleware('admin');

//======= MASTER DATA ========
// Route Tahun Akademik
Route::get('/admin/tahun-akademik', [TahunAkademikController::class, 'index'])->name('tahunAkademik.index');
Route::post('/admin/tahun-akademik/store', [TahunAkademikController::class, 'store'])->name('tahunAkademik.store');
Route::get('/admin/tahun-akademik/edit/{id}', [TahunAkademikController::class, 'edit'])->name('tahunAkademik.edit');
Route::put('/admin/tahun-akademik/update/{id}', [TahunAkademikController::class, 'update'])->name('tahunAkademik.update');
Route::get('/admin/tahun-akademik/destroy/{id}', [TahunAkademikController::class, 'destroy'])->name('tahunAkademik.destroy');

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

// Route Level User
Route::get('/admin/level-user', [LevelController::class, 'index']);
Route::post('/admin/level-user/store', [LevelController::class, 'store'])->name('level.store');
Route::put('/admin/level-user/update/{id}', [LevelController::class, 'update'])->name('level.update');
Route::get('/admin/level-user/delete/{id}', [LevelController::class, 'destroy'])->name('level.delete');

//Route Data User
Route::get('/admin/data-user', [UserController::class, 'index']);
//Route Data Dosen
Route::get('/admin/data-dosen', [DosenController::class, 'index']);
//Route Data Komisi
Route::get('/admin/data-komisi', [KomisiController::class, 'index']);

//=========== TUGAS AKHIR ================
//status TA
Route::get('/tugas-akhir/statusta', [StatusTAController::class, 'index'])->name('statusta.index');
Route::post('/tugas-akhir/statusta/store', [StatusTAController::class, 'store'])->name('statusta.store');
Route::put('/tugas-akhir/statusta/update/{id}', [StatusTAController::class, 'update'])->name('statusta.update');
Route::get('/tugas-akhir/statusta/delete/{id}', [StatusTAController::class, 'destroy'])->name('statusta.delete');

//data TA
Route::get('/tugas-akhir/data-TA', [TAController::class, 'index'])->name('TA.index');
Route::get('/tugas-akhir/detail-TA/{id}', [TAController::class, 'show'])->name('TA.show');
Route::get('/tugas-akhir/data-TA/create', [TAController::class, 'create'])->name('TA.create');
Route::get('/tugas-akhir/data-TA/store', [TAController::class, 'store'])->name('TA.store');
Route::get('/tugas-akhir/data-TA/edit/{id}', [TAController::class, 'edit'])->name('TA.edit');
Route::get('/tugas-akhir/data-TA/update/{id}', [TAController::class, 'update'])->name('TA.update');
Route::get('/tugas-akhir/data-TA/delete/{id}', [TAController::class, 'destroy'])->name('TA.delete');

//data Konsul
Route::get('/tugas-akhir/data-konsultasi', [KonsultasiTAController::class, 'index'])->name('konsultasi.index');
Route::get('/tugas-akhir/data-konsultasi/{id}', [KonsultasiTAController::class, 'show'])->name('konsultasi.show');
Route::get('/tugas-akhir/data-konsultasi/diterima/{konsultasiTA}', [KonsultasiTAController::class, 'diterima'])->name('konsultasi.diterima');
Route::get('/tugas-akhir/data-pendadaran/ditolak/{konsultasiTA}', [KonsultasiTAController::class, 'ditolak'])->name('konsultasi.ditolak');

//semprop
Route::get('/tugas-akhir/semprop', [SeminarProposalController::class, 'index'])->name('semprop.index');
Route::get('/tugas-akhir/semprop/edit/{id}', [SeminarProposalController::class, 'edit'])->name('semprop.edit');
Route::get('/tugas-akhir/semprop/update/{id}', [SeminarProposalController::class, 'update'])->name('semprop.update');
Route::get('/tugas-akhir/semprop/delete/{id}', [SeminarProposalController::class, 'destroy'])->name('semprop.delete');
Route::get('/tugas-akhir/semprop/diterima/{seminarProposal}', [SeminarProposalController::class, 'diterima'])->name('semprop.diterima');
Route::get('/tugas-akhir/semprop/ditolak/{SeminarProposal}', [SeminarProposalController::class, 'ditolak'])->name('semprop.ditolak');

//semhas
Route::get('/tugas-akhir/semhas', [SeminarHasilController::class, 'index'])->name('semhas.index');
Route::get('/tugas-akhir/semhas/edit/{id}', [SeminarHasilController::class, 'edit'])->name('semhas.edit');
Route::get('/tugas-akhir/semhas/update/{id}', [SeminarHasilController::class, 'update'])->name('semhas.update');
Route::get('/tugas-akhir/semhas/delete/{id}', [SeminarHasilController::class, 'destroy'])->name('semhas.delete');
Route::get('/tugas-akhir/semhas/diterima/{seminarHasil}', [SeminarHasilController::class, 'diterima'])->name('semhas.diterima');
Route::get('/tugas-akhir/semhas/ditolak/{SeminarHasil}', [SeminarHasilController::class, 'ditolak'])->name('semhas.ditolak');

//spk
Route::get('/tugas-akhir/spk', [SPKController::class, 'index'])->name('spk.index');
Route::post('/tugas-akhir/spk/store', [SPKController::class, 'store'])->name('spk.store');
Route::put('/tugas-akhir/spk/download/{filename}', [SPKController::class, 'download'])->name('spk.download');
Route::put('/tugas-akhir/spk/update/{id}', [SPKController::class, 'update'])->name('spk.update');
Route::get('/tugas-akhir/spk/destroy/{id}', [SPKController::class, 'destroy'])->name('spk.destroy');
Route::post('/tugas-akhir/spk/nim/', [SPKController::class, 'nim'])->name('spk.nim');

//nilai TA
Route::get('/tugas-akhir/nilaita', [NilaiTAController::class, 'index'])->name('nilaita.index');
Route::post('/tugas-akhir/nilaita/store', [NilaiTAController::class, 'store'])->name('nilaita.store');
Route::put('/tugas-akhir/nilaita/update/{id}', [NilaiTAController::class, 'update'])->name('nilaita.update');
Route::get('/tugas-akhir/nilaita/delete/{id}', [NilaiTAController::class, 'destroy'])->name('nilaita.delete');
Route::post('/tugas-akhir/nilaita/nim/', [NilaiTAController::class, 'nim'])->name('nilaita.nim');

//=============== PENDADARAN ===================
//status pendadaran
Route::get('pendadaran/status-pendadaran', [StatusPendadaranController::class, 'index'])->name('statuspendadaran.index');
Route::post('pendadaran/status-pendadaran/store', [StatusPendadaranController::class, 'store'])->name('statuspendadaran.store');
Route::put('pendadaran/status-pendadaran/update/{id}', [StatusPendadaranController::class, 'update'])->name('statuspendadaran.update');
Route::get('pendadaran/status-pendadaran/delete/{id}', [StatusPendadaranController::class, 'destroy'])->name('statuspendadaran.delete');

//data pendadaran
Route::get('pendadaran/data-pendadaran', [PendadaranController::class, 'index'])->name('pendadaran.index');
Route::get('pendadaran/data-pendadaran/create', [PendadaranController::class, 'create'])->name('pendadaran.create');
Route::post('pendadaran/data-pendadaran/store', [PendadaranController::class, 'store'])->name('pendadaran.store');
Route::get('pendadaran/data-pendadaran/edit/{id}', [PendadaranController::class, 'edit'])->name('pendadaran.edit');
Route::put('pendadaran/data-pendadaran/update/{id}', [PendadaranController::class, 'update'])->name('pendadaran.update');
Route::get('pendadaran/data-pendadaran/delete/{id}', [PendadaranController::class, 'destroy'])->name('pendadaran.delete');
Route::get('pendadaran/data-pendadaran/diterima/{pendadaran}', [PendadaranController::class, 'diterima'])->name('pendadaran.diterima');
Route::get('pendadaran/data-pendadaran/ditolak/{pendadaran}', [PendadaranController::class, 'ditolak'])->name('pendadaran.ditolak');

//nilai pendadaran
Route::get('pendadaran/nilai-pendadaran', [NilaiPendadaranController::class, 'index'])->name('nilaiPendadaran.index');
Route::post('pendadaran/nilai-pendadaran/store', [NilaiPendadaranController::class, 'store'])->name('nilaiPendadaran.store');
Route::put('pendadaran/nilai-pendadaran/update/{id}', [NilaiPendadaranController::class, 'update'])->name('nilaiPendadaran.update');
Route::get('pendadaran/nilai-pendadaran/delete/{id}', [NilaiPendadaranController::class, 'destroy'])->name('nilaiPendadaran.delete');
Route::post('/pendadaran/nilai-pendadaran/nim/', [NilaiPendadaranController::class, 'nim'])->name('nilaipendadaran.nim');

// berita acara pendadaran
Route::get('/pendadaran/beritaacara', [BeritaAcaraPendadaranController::class, 'index'])->name('beritaacarapendadaran.index');
Route::post('/pendadaran/beritaacara/store', [BeritaAcaraPendadaranController::class, 'store'])->name('beritaacarapendadaran.store');
Route::put('/pendadaran/beritaacara/download/{filename}', [BeritaAcaraPendadaranController::class, 'download'])->name('beritaacarapendadaran.download');
Route::put('/pendadaran/beritaacara/update/{id}', [BeritaAcaraPendadaranController::class, 'update'])->name('beritaacarapendadaran.update');
Route::get('/pendadaran/beritaacara/destroy/{id}', [BeritaAcaraPendadaranController::class, 'destroy'])->name('beritaacarapendadaran.destroy');
Route::post('/pendadaran/beritaacara/nim/', [BeritaAcaraPendadaranController::class, 'nim'])->name('beritaacarapendadaran.nim');


//=================== YUDISIUM =========================
//status yudisium
Route::get('yudisium/status-yudisium', [StatusYudisiumController::class, 'index'])->name('statusyudisium.index');
Route::post('yudisium/status-yudisium/store', [StatusYudisiumController::class, 'store'])->name('statusyudisium.store');
Route::put('yudisium/status-yudisium/update/{id}', [StatusYudisiumController::class, 'update'])->name('statusyudisium.update');
Route::get('yudisium/status-yudisium/delete/{id}', [StatusYudisiumController::class, 'destroy'])->name('statusyudisium.delete');

//data yudisium
Route::get('yudisium/data-yudisium', [YudisiumController::class, 'index'])->name('yudisium.index');
Route::get('yudisium/data-yudisium/create', [YudisiumController::class, 'create'])->name('yudisium.create');
Route::post('yudisium/data-yudisium/store', [YudisiumController::class, 'store'])->name('yudisium.store');
Route::get('yudisium/data-yudisium/edit/{id}', [YudisiumController::class, 'edit'])->name('yudisium.edit');
Route::put('yudisium/data-yudisium/update/{id}', [YudisiumController::class, 'update'])->name('yudisium.update');
Route::get('yudisium/data-yudisium/delete/{id}', [YudisiumController::class, 'destroy'])->name('yudisium.delete');
Route::get('yudisium/data-yudisium/diterima/{yudisium}', [YudisiumController::class, 'diterima'])->name('yudisium.diterima');
Route::get('yudisium/data-yudisium/ditolak/{yudisium}', [YudisiumController::class, 'ditolak'])->name('yudisium.ditolak');
Route::get('yudisium/data-yudisium/ulang/{yudisium}', [YudisiumController::class, 'ulang'])->name('yudisium.ulang');
Route::get('yudisium/data-yudisium/selesai/{yudisium}', [YudisiumController::class, 'selesai'])->name('yudisium.selesai');

// sk kelulusan
Route::get('/yudisium/sk', [SKController::class, 'index'])->name('sk.index');
Route::post('/yudisium/sk/store', [SKController::class, 'store'])->name('sk.store');
Route::put('/yudisium/sk/download/{filename}', [SKController::class, 'download'])->name('sk.download');
Route::put('/yudisium/sk/update/{id}', [SKController::class, 'update'])->name('sk.update');
Route::get('/yudisium/sk/destroy/{id}', [SKController::class, 'destroy'])->name('sk.destroy');
Route::post('/yudisium/sk/nim/', [SKController::class, 'nim'])->name('sk.nim');


//================= ROUTE KOMISI ====================
Route::get('/komisi/beranda', [BerandaController::class, 'index'])->name('komisi.beranda')->middleware([Komisi::class]);

//================= ROUTE DOSEN ===========================
Route::get('/dosen/beranda', [BerandaController::class, 'index'])->name('dosen.beranda')->middleware([Dosen::class]);

//================= ROUTE KAJUR ===========================
Route::get('/kajur/beranda', [BerandaController::class, 'index'])->name('kajur.beranda')->middleware([Kajur::class]);

//================= ROUTE MAHASISWA =========================
Route::get('/mhs/beranda', function () {
    return view('mahasiswa.menu');
})->name('mahasiswa.menu')->middleware([Mahasiswa::class]);

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

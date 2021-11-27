<?php

use App\Http\Middleware\Dosen;
use App\Http\Middleware\Kajur;
use App\Http\Middleware\Komisi;
use Subfission\Cas\Facades\Cas;
use App\Http\Middleware\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SKController;
use App\Http\Controllers\TAController;
use App\Http\Controllers\CasController;
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
use App\Http\Controllers\MahasiswaTAController;
use App\Http\Controllers\TAMahasiswaController;
use App\Http\Controllers\KonsultasiTAController;
use App\Http\Controllers\KonsultasiTAMahasiswaController;
use App\Http\Controllers\SeminarHasilController;
use App\Http\Controllers\SeminarHasilMahasiswaController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\StatusYudisiumController;
use App\Http\Controllers\NilaiPendadaranController;
use App\Http\Controllers\SeminarProposalController;
use App\Http\Controllers\SeminarProposalMahasiswaController;
use App\Http\Controllers\StatusPendadaranController;
use App\Http\Controllers\BeritaAcaraPendadaranController;

Auth::routes();

// ROUTE GUEST
Route::get('/', function () {
    return view('guest.login');
})->name('loginpage');  //Halaman Login LandingPage

// Route::get('/cas/login', function () {
//     cas()->authenticate();
// })->name('cas.login'); //Halaman login KORI

// Route::post('/cas/logout', ['middleware' => 'auth', function () {
//     cas()->logout(url('/'));
// }])->name('cas.logout'); //Logout SSO

Route::get('/cas/login', 'CasController@callback')->name('cas.login');  //Halaman login KORI
Route::post('/cas/logout', 'CasController@logout')->name('cas.logout');


//=============== ROUTE ADMIN ====================
Route::get('/admin/beranda', 'BerandaController@index')->name('admin.beranda')->middleware('admin');

//======= MASTER DATA ========
// Route Tahun Akademik
Route::get('/admin/tahun-akademik', 'TahunAkademikController@index')->name('tahunAkademik.index');
Route::post('/admin/tahun-akademik/store', 'TahunAkademikController@store')->name('tahunAkademik.store');
Route::get('/admin/tahun-akademik/edit/{id}', 'TahunAkademikController@edit')->name('tahunAkademik.edit');
Route::put('/admin/tahun-akademik/update/{id}', 'TahunAkademikController@update')->name('tahunAkademik.update');
Route::get('/admin/tahun-akademik/destroy/{id}', 'TahunAkademikController@destroy')->name('tahunAkademik.destroy');

// Route Jurusan
Route::get('/jurusan', 'JurusanController@index')->name('jurusan.index');
Route::post('/jurusan/store', 'JurusanController@store')->name('jurusan.store');
Route::get('/jurusan/edit/{id}', 'JurusanController@edit')->name('jurusan.edit');
Route::put('/jurusan/update/{id}', 'JurusanController@update')->name('jurusan.update');
Route::get('/jurusan/destroy/{id}', 'JurusanController@destroy')->name('jurusan.destroy');

// Route Data Ruangan
Route::get('/data-ruang', 'RuangController@index')->name('ruang.index');
Route::post('/data-ruang/store', 'RuangController@store')->name('ruang.store');
Route::put('/data-ruang/update/{id}', 'RuangController@update')->name('ruang.update');
Route::get('/data-ruang/destroy/{id}', 'RuangController@destroy')->name('ruang.destroy');

// Route Level User
Route::get('/level-user', 'LevelController@index')->name('level.index');
Route::post('/level-user/store', 'LevelController@store')->name('level.store');
Route::put('/level-user/update/{id}', 'LevelController@update')->name('level.update');
Route::get('/level-user/delete/{id}', 'LevelController@destroy')->name('level.delete');

//Route Data User
Route::get('/data-user', 'UserController@index')->name('user.index');

//Route Data Dosen
Route::get('/data-dosen', 'DosenController@index')->name('dosen.index');

//Route Data Komisi
Route::get('/data-komisi', 'KomisiController@index')->name('komisi.index');

//Route Data Komisi
Route::get('/data-kajur', 'DosenController@kajur')->name('dataKajur');


//================= ROUTE DOSEN ========================
Route::get('/dosen/beranda', [BerandaController::class, 'index'])->name('dosen.beranda')->middleware([Dosen::class]);

//================= ROUTE KOMISI ====================
Route::get('/komisi/beranda', [BerandaController::class, 'index'])->name('komisi.beranda')->middleware([Komisi::class]);

//================= ROUTE KAJUR ===========================
Route::get('/kajur/beranda', [BerandaController::class, 'index'])->name('kajur.beranda')->middleware([Kajur::class]);

//=========== TUGAS AKHIR ================
//status TA
Route::get('/tugas-akhir/statusta', 'StatusController@index')->name('statusta.index');
Route::post('/tugas-akhir/statusta/store', 'StatusController@store')->name('statusta.store');
Route::put('/tugas-akhir/statusta/update/{id}', 'StatusController@update')->name('statusta.update');
Route::get('/tugas-akhir/statusta/delete/{id}', 'StatusController@destroy')->name('statusta.delete');

//data TA
Route::get('/tugas-akhir/data-TA', 'TAController@index')->name('TA.index');
Route::get('/tugas-akhir/detail-TA/{id}',  'TAController@show')->name('TA.show');
Route::get('/tugas-akhir/data-TA/create', 'TAController@create')->name('TA.create');
Route::post('/tugas-akhir/data-TA/store', 'TAController@store')->name('TA.store');
Route::put('/tugas-akhir/data-TA/download/{filename}',  'TAController@download')->name('TA.download');
Route::get('/tugas-akhir/data-TA/edit/{id}', 'TAController@edit')->name('TA.edit');
Route::post('/tugas-akhir/data-TA/nim/',  'TAController@nim')->name('TA.nim');
Route::put('/tugas-akhir/data-TA/update/{id}', 'TAController@update')->name('TA.update');
Route::get('/tugas-akhir/data-TA/delete/{id}', 'TAController@destroy')->name('TA.delete');

//data Konsul
Route::get('/tugas-akhir/data-konsultasi', 'KonsultasiTAController@index')->name('konsultasi.index');
Route::get('/tugas-akhir/data-konsultasi/{id}',  'KonsultasiTAController@show')->name('konsultasi.show');
Route::get('/tugas-akhir/data-konsultasi/diterima/{konsultasiTA}', 'KonsultasiTAController@diterima')->name('konsultasi.diterima');
Route::get('/tugas-akhir/data-pendadaran/ditolak/{konsultasiTA}', 'KonsultasiTAController@ditolak')->name('konsultasi.ditolak');

//semprop
Route::get('/tugas-akhir/semprop', 'SeminarProposalController@index')->name('semprop.index');
Route::get('/tugas-akhir/semprop/create',  'SeminarProposalController@create')->name('semprop.create');
Route::post('/tugas-akhir/semprop/store',  'SeminarProposalController@store')->name('semprop.store');
Route::post('/tugas-akhir/semprop/nim/',  'SeminarProposalController@nim')->name('semprop.nim');
Route::get('/tugas-akhir/semprop/edit/{id}', 'SeminarProposalController@edit')->name('semprop.edit');
Route::put('/tugas-akhir/semprop/update/{id}', 'SeminarProposalController@update')->name('semprop.update');
Route::get('/tugas-akhir/semprop/delete/{id}', 'SeminarProposalController@destroy')->name('semprop.delete');
Route::post('/tugas-akhir/semprop/surat/{id}',  'SeminarProposalController@show')->name('semprop.surat');
Route::put('/tugas-akhir/beritaAcara/download/{filename}',  'SeminarProposalController@download')->name('semprop.download');
Route::get('/tugas-akhir/beritaAcara/pdf/{id}',  'SeminarProposalController@eksport')->name('semprop.eksport');
Route::get('/tugas-akhir/semprop/diterima/{seminarProposal}', 'SeminarProposalController@diterima')->name('semprop.diterima');
Route::get('/tugas-akhir/semprop/ditolak/{SeminarProposal}', 'SeminarProposalController@ditolak')->name('semprop.ditolak');
Route::get('/tugas-akhir/semprop/berkas', 'SeminarProposalController@berkas')->name('semprop.berkas');


//semhas
Route::get('/tugas-akhir/semhas',  'SeminarHasilController@index')->name('semhas.index');
Route::get('/tugas-akhir/semhas/create',  'SeminarHasilController@create')->name('semhas.create');
Route::post('/tugas-akhir/semhas/store',  'SeminarHasilController@store')->name('semhas.store');
Route::post('/tugas-akhir/semhas/nim/',  'SeminarHasilController@nim')->name('semhas.nim');
Route::get('/tugas-akhir/semhas/edit/{id}',  'SeminarHasilController@edit')->name('semhas.edit');
Route::post('/tugas-akhir/semhas/store',  'SeminarHasilController@store')->name('semhas.store');
Route::post('/tugas-akhir/semhas/surat/{id}',  'SeminarHasilController@show')->name('semhas.surat');
Route::put('/tugas-akhir/semhas/update/{id}',  'SeminarHasilController@update')->name('semhas.update');
Route::get('/tugas-akhir/semhas/delete/{id}',  'SeminarHasilController@destroy')->name('semhas.delete');
Route::put('/tugas-akhir/beritaAcaraSemhas/download/{filename}',  'SeminarHasilController@download')->name('semhas.download');
Route::get('/tugas-akhir/beritaAcaraSemhas/pdf/{id}',  'SeminarHasilController@eksport')->name('semhas.eksport');
Route::get('/tugas-akhir/semhas/diterima/{seminarHasil}',  'SeminarHasilController@diterima')->name('semhas.diterima');
Route::get('/tugas-akhir/semhas/ditolak/{SeminarHasil}',  'SeminarHasilController@ditolak')->name('semhas.ditolak');
Route::get('/tugas-akhir/semhas/berkas', 'SeminarHasilController@berkas')->name('semhas.berkas');

//spk
Route::get('/tugas-akhir/spk',  'SPKController@index')->name('spk.index');
Route::post('/tugas-akhir/spk/store',  'SPKController@store')->name('spk.store');
Route::post('/tugas-akhir/spk/create/{id}',  'SPKController@create')->name('spk.create');
Route::put('/tugas-akhir/spk/download/{filename}',  'SPKController@download')->name('spk.download');
Route::put('/tugas-akhir/spk/update/{id}',  'SPKController@update')->name('spk.update');
Route::get('/tugas-akhir/spk/destroy/{id}',  'SPKController@destroy')->name('spk.destroy');
Route::post('/tugas-akhir/spk/nim/',  'SPKController@nim')->name('spk.nim');
Route::get('/tugas-akhir/spk/pdf/{id}',  'SPKController@eksport')->name('spk.eksport');
Route::get('/tugas-akhir/spk/berkas', 'SPKController@berkas')->name('spk.berkas');

//nilai TA
Route::get('/tugas-akhir/nilaita',  'NilaiTAController@index')->name('nilaita.index');
Route::post('/tugas-akhir/nilaita/store',  'NilaiTAController@store')->name('nilaita.store');
Route::put('/tugas-akhir/nilaita/update/{id}',  'NilaiTAController@update')->name('nilaita.update');
Route::get('/tugas-akhir/nilaita/delete/{id}',  'NilaiTAController@destroy')->name('nilaita.delete');
Route::post('/tugas-akhir/nilaita/nim/',  'NilaiTAController@nim')->name('nilaita.nim');

//distribusi
Route::get('/tugas-akhir/distribusi',  'DistribusiController@index')->name('distribusi.index');
Route::put('/tugas-akhir/distribusi/download/{filename}',  'DistribusiController@download')->name('distribusi.download');
Route::get('/tugas-akhir/distribusi/destroy/{id}',  'DistribusiController@destroy')->name('distribusi.destroy');

//=============== PENDADARAN ===================
//status pendadaran
Route::get('/pendadaran/status-pendadaran',  'StatusPendadaranController@index')->name('statuspendadaran.index');
Route::post('/pendadaran/status-pendadaran/store',  'StatusPendadaranController@store')->name('statuspendadaran.store');
Route::put('/pendadaran/status-pendadaran/update/{id}',  'StatusPendadaranController@update')->name('statuspendadaran.update');
Route::get('/pendadaran/status-pendadaran/delete/{id}',  'StatusPendadaranController@destroy')->name('statuspendadaran.delete');

//data pendadaran
Route::get('/pendadaran/data-pendadaran',  'PendadaranController@index')->name('pendadaran.index');
Route::get('/pendadaran/data-pendadaran/create',  'PendadaranController@create')->name('pendadaran.create');
Route::post('/pendadaran/data-pendadaran/store',  'PendadaranController@store')->name('pendadaran.store');
Route::get('/pendadaran/data-pendadaran/edit/{id}',  'PendadaranController@edit')->name('pendadaran.edit');
Route::put('/pendadaran/data-pendadaran/update/{id}',  'PendadaranController@update')->name('pendadaran.update');
Route::get('/pendadaran/data-pendadaran/delete/{id}',  'PendadaranController@destroy')->name('pendadaran.delete');

//nilai pendadaran
Route::get('/pendadaran/nilai-pendadaran', 'NilaiPendadaranController@index')->name('nilaiPendadaran.index');
Route::post('/pendadaran/nilai-pendadaran/store', 'NilaiPendadaranController@store')->name('nilaiPendadaran.store');
Route::put('/pendadaran/nilai-pendadaran/update/{id}', 'NilaiPendadaranController@update')->name('nilaiPendadaran.update');
Route::get('/pendadaran/nilai-pendadaran/delete/{id}', 'NilaiPendadaranController@destroy')->name('nilaiPendadaran.delete');
Route::post('/pendadaran/nilai-pendadaran/nim/', 'NilaiPendadaranController@nim')->name('nilaipendadaran.nim');

// berita acara pendadaran
Route::get('/pendadaran/beritaacara',  'BeritaAcaraPendadaranController@index')->name('beritaacarapendadaran.index');
Route::post('/pendadaran/beritaacara/store',  'BeritaAcaraPendadaranController@store')->name('beritaacarapendadaran.store');
Route::put('/pendadaran/beritaacara/download/{filename}',  'BeritaAcaraPendadaranController@download')->name('beritaacarapendadaran.download');
Route::put('/pendadaran/beritaacara/update/{id}',  'BeritaAcaraPendadaranController@update')->name('beritaacarapendadaran.update');
Route::get('/pendadaran/beritaacara/destroy/{id}',  'BeritaAcaraPendadaranController@destroy')->name('beritaacarapendadaran.destroy');
Route::post('/pendadaran/beritaacara/nim/',  'BeritaAcaraPendadaranController@nim')->name('beritaacarapendadaran.nim');


//=================== YUDISIUM =========================
//status yudisium
Route::get('/yudisium/status-yudisium', 'StatusYudisiumController@index')->name('statusyudisium.index');
Route::post('/yudisium/status-yudisium/store', 'StatusYudisiumController@store')->name('statusyudisium.store');
Route::put('/yudisium/status-yudisium/update/{id}', 'StatusYudisiumController@update')->name('statusyudisium.update');
Route::get('/yudisium/status-yudisium/delete/{id}', 'StatusYudisiumController@destroy')->name('statusyudisium.delete');

//data yudisium
Route::get('/yudisium/data-yudisium',  'YudisiumController@index')->name('yudisium.index');
Route::get('/yudisium/data-yudisium/create',  'YudisiumController@create')->name('yudisium.create');
Route::post('/yudisium/data-yudisium/store',  'YudisiumController@store')->name('yudisium.store');
Route::get('/yudisium/data-yudisium/edit/{id}',  'YudisiumController@edit')->name('yudisium.edit');
Route::put('/yudisium/data-yudisium/update/{id}',  'YudisiumController@update')->name('yudisium.update');
Route::get('/yudisium/data-yudisium/delete/{id}',  'YudisiumController@destroy')->name('yudisium.delete');
Route::get('/yudisium/data-yudisium/diterima/{yudisium}',  'YudisiumController@diterima')->name('yudisium.diterima');
Route::get('/yudisium/data-yudisium/ditolak/{yudisium}',  'YudisiumController@ditolak')->name('yudisium.ditolak');
Route::get('/yudisium/data-yudisium/ulang/{yudisium}',  'YudisiumController@ulang')->name('yudisium.ulang');
Route::get('/yudisium/data-yudisium/selesai/{yudisium}',  'YudisiumController@selesai')->name('yudisium.selesai');

// sk kelulusan
Route::get('/yudisium/sk', 'SKController@index')->name('sk.index');
Route::post('/yudisium/sk/store', 'SKController@store')->name('sk.store');
Route::put('/yudisium/sk/download/{filename}', 'SKController@download')->name('sk.download');
Route::put('/yudisium/sk/update/{id}', 'SKController@update')->name('sk.update');
Route::get('/yudisium/sk/destroy/{id}', 'SKController@destroy')->name('sk.destroy');
Route::post('/yudisium/sk/nim/', 'SKController@nim')->name('sk.nim');

//================= ROUTE MAHASISWA =========================

Route::middleware('mahasiswa')->prefix('mahasiswa')->group(function () {

    Route::get('/menu', function () {
        return view('mahasiswa.menu');
    })->name('mahasiswa.menu');

    //============= TUGAS AKHIR ===============
    Route::get('/tugas-akhir/beranda', 'BerandaController@mahasiswaTA')->name('mahasiswaTA.beranda');
    Route::put('/tugas-akhir/downloadBeritaAcaraSempro/{filename}',  'BerandaController@downloadSemprop')->name('download.semprop');
    Route::put('/tugas-akhir/downloadBeritaAcaraSemhas/{filename}',  'BerandaController@downloadSemhas')->name('download.semhas');
    Route::put('/tugas-akhir/downloadSPK/{filename}',  'BerandaController@downloadSPK')->name('download.spk');

    //pengajuan
    Route::get('/tugas-akhir/data-TA/create', 'TAMahasiswaController@create')->name('mahasiswaTA.create');
    Route::post('/tugas-akhir/data-TA/store', 'TAMahasiswaController@store')->name('mahasiswaTA.store');

    //konsultasi
    Route::get('/tugas-akhir/konsultasi', 'KonsultasiTAMahasiswaController@index')->name('mahasiswaTA.konsultasi');
    Route::post('/tugas-akhir/konsultasi/store', 'KonsultasiTAMahasiswaController@store')->name('mahasiswaKonsultasi.store');
    Route::put('/tugas-akhir/konsultasi/update/{id}', 'KonsultasiTAMahasiswaController@update')->name('mahasiswaKonsultasi.update');
    Route::get('/tugas-akhir/konsultasi/delete/{id}', 'KonsultasiTAMahasiswaController@destroy')->name('mahasiswaKonsultasi.delete');

    //seminar proposal
    Route::get('/tugas-akhir/semprop', 'SeminarProposalMahasiswaController@create')->name('mahasiswaTA.semprop');
    Route::post('/tugas-akhir/semprop/store', 'SeminarProposalMahasiswaController@store')->name('mahasiswaSempro.store');

    //seminar hasil
    Route::get('/tugas-akhir/semhas', 'SeminarHasilMahasiswaController@create')->name('mahasiswaTA.semhas');
    Route::post('/tugas-akhir/semhas/store', 'SeminarHasilMahasiswaController@store')->name('mahasiswaSemhas.store');

    //nilai TA
    Route::get('/tugas-akhir/nilaita',  'NilaiTAController@index')->name('nilaita_mhs.index');
    //distribusi
    Route::get('/tugas-akhir/distribusi-mahasiswa', 'DistribusiController@create')->name('distribusi.create');
    Route::post('/tugas-akhir/distribusi/store', 'DistribusiController@store')->name('distribusi.store');

    //=========== PENDADARAN==============

    Route::get('/pendadaran/beranda', 'BerandaController@mahasiswaPendadaran')->name('mahasiswaPendadaran.beranda');

    Route::get('/pendadaran/pendaftaran', 'PendadaranMahasiswaController@create')->name('mahasiswaPendadaran.create');
    Route::get('/pendadaran/jadwal', function () {
        return view('mahasiswa.pendadaran.pages.jadwal');
    });
    Route::get('/pendadaran/nilai', function () {
        return view('mahasiswa.pendadaran.pages.nilai');
    });

    //============= YUDISIUM =============

    Route::get('/yudisium/beranda', 'BerandaController@mahasiswaYudisium')->name('mahasiswaYudisium.beranda');

    Route::get('/yudisium/pendaftaran', function () {
        return view('mahasiswa.yudisium.pages.pendaftaran');
    });
    Route::get('/yudisium/jadwal', function () {
        return view('mahasiswa.yudisium.pages.jadwal');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

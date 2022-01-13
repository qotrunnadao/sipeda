<?php

use App\Imports\UserImport;
use App\Imports\DosenImport;
use App\Http\Middleware\Dosen;
use App\Http\Middleware\Kajur;
use App\Http\Middleware\Komisi;
use Subfission\Cas\Facades\Cas;
use App\Http\Middleware\Mahasiswa;
use App\Models\Dosen as ModelsDosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SKController;
use App\Http\Controllers\TAController;
use App\Http\Controllers\CasController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KajurController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\APISIAController;
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
use App\Http\Controllers\SeminarHasilController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\StatusYudisiumController;
use App\Http\Controllers\NilaiPendadaranController;
use App\Http\Controllers\RuangPendadaranController;
use App\Http\Controllers\SeminarProposalController;
use App\Http\Controllers\StatusPendadaranController;
use App\Http\Controllers\BeritaAcaraPendadaranController;
use App\Http\Controllers\KonsultasiTAMahasiswaController;
use App\Http\Controllers\SeminarHasilMahasiswaController;
use App\Http\Controllers\SeminarProposalMahasiswaController;

Auth::routes();

// ROUTE GUEST
Route::get('/', function () {
    return view('guest.login');
})->name('loginpage');  //Halaman Login LandingPage


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
Route::get('/data-ruang-seminar', 'RuangController@index')->name('ruang.index');
Route::post('/data-ruang/store', 'RuangController@store')->name('ruang.store');
Route::put('/data-ruang/update/{id}', 'RuangController@update')->name('ruang.update');
Route::get('/data-ruang/destroy/{id}', 'RuangController@destroy')->name('ruang.destroy');

// Route Data Ruangan pendadaran
Route::get('/data-ruang-pendadaran', 'RuangPendadaranController@index')->name('ruangPendadaran.index');
Route::post('/data-ruang-pendadaran/store', 'RuangPendadaranController@store')->name('ruangPendadaran.store');
Route::put('/data-ruang-pendadaran/update/{id}', 'RuangPendadaranController@update')->name('ruangPendadaran.update');
Route::get('/data-ruang-pendadaran/destroy/{id}', 'RuangPendadaranController@destroy')->name('ruangPendadaran.destroy');

// Route Level User
Route::get('/level-user', 'LevelController@index')->name('level.index');
Route::post('/level-user/store', 'LevelController@store')->name('level.store');
Route::put('/level-user/update/{id}', 'LevelController@update')->name('level.update');
Route::get('/level-user/delete/{id}', 'LevelController@destroy')->name('level.delete');

//Route Data User
Route::get('/data-user', 'UserController@index')->name('user.index');
Route::put('/data-user/update/{id}', 'UserController@update')->name('user.update');
Route::post('/data-user/import-excel', 'UserController@import_excel')->name('user.excel');


//Route Data Dosen
Route::get('/data-dosen', 'DosenController@index')->name('dosen.index');
Route::put('/data-dosen/update/{id}', 'DosenController@update')->name('dosen.update');
Route::post('/data-dosen/import-excel', 'DosenController@import_excel')->name('dosen.excel');

//Route Data Komisi
Route::get('/data-komisi', 'KomisiController@index')->name('komisi.index');
Route::put('/data-komisi/update/{id}', 'KomisiController@update')->name('komisi.update');

//Route Data Kajur
Route::get('/data-kajur', 'KajurController@index')->name('dataKajur');
Route::put('/data-kajur/update/{id}', 'KajurController@update')->name('kajur.update');


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
Route::post('/tugas-akhir/data-konsultasi/nim/',  'KonsultasiTAController@nim')->name('konsultasi.nim');
Route::post('/tugas-akhir/data-konsultasi/dosen/',  'KonsultasiTAController@dosen')->name('konsultasi.dosen');
Route::post('/tugas-akhir/data-konsultasi/store', 'KonsultasiTAController@store')->name('konsultasi.store');
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
Route::put('/tugas-akhir/proposal/{filename}',  'SeminarProposalController@proposal')->name('semprop.proposal');
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
Route::put('/tugas-akhir/laporan/download/{filename}',  'SeminarHasilController@laporan')->name('semhas.laporan');
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
Route::post('/tugas-akhir/distribusi/nim/',  'DistribusiController@nim')->name('distribusi.nim');
Route::get('/tugas-akhir/distribusi',  'DistribusiController@index')->name('distribusi.index');
Route::post('/tugas-akhir/distribusi/store', 'DistribusiController@show')->name('distribusi.show');
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
Route::put('/pendadaran/data-pendadaran/download/{filename}',  'PendadaranController@download')->name('pendadaran.download');
Route::get('/pendadaran/berita-acara/pdf/{id}',  'PendadaranController@eksport')->name('pendadaran.eksport');
Route::post('/pendadaran/data-pendadaran/store',  'PendadaranController@store')->name('pendadaran.store');
Route::get('/pendadaran/data-pendadaran/edit/{id}',  'PendadaranController@edit')->name('pendadaran.edit');
Route::put('/pendadaran/data-pendadaran/verifikasi/{id}',  'PendadaranController@verifikasi')->name('pendadaran.verifikasi');
Route::put('/pendadaran/data-pendadaran/update/{id}',  'PendadaranController@update')->name('pendadaran.update');
Route::post('/pendadaran/data-pendadaran/nim/', 'PendadaranController@nim')->name('pendadaran.nim');
Route::get('/pendadaran/data-pendadaran/delete/{id}',  'PendadaranController@destroy')->name('pendadaran.delete');

//nilai pendadaran
Route::get('/pendadaran/nilai-pendadaran', 'NilaiPendadaranController@index')->name('nilaiPendadaran.index');
Route::post('/pendadaran/nilai-pendadaran/store', 'NilaiPendadaranController@store')->name('nilaiPendadaran.store');
Route::put('/pendadaran/nilai-pendadaran/update/{id}', 'NilaiPendadaranController@update')->name('nilaiPendadaran.update');
Route::get('/pendadaran/nilai-pendadaran/delete/{id}', 'NilaiPendadaranController@destroy')->name('nilaiPendadaran.delete');
Route::post('/pendadaran/nilai-pendadaran/nim/', 'NilaiPendadaranController@nim')->name('nilaipendadaran.nim');

// berita acara pendadaran
Route::get('/pendadaran/beritaacara',  'BeritaAcaraPendadaranController@index')->name('beritaacarapendadaran.index');
Route::post('/pendadaran/beritaacara/store/{id}',  'BeritaAcaraPendadaranController@store')->name('beritaacarapendadaran.store');
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
Route::put('/yudisium/berkas/download/{filename}',  'YudisiumController@download')->name('yudisium.download');
Route::put('/yudisium/berkas/transkip/{filename}',  'YudisiumController@transkip')->name('yudisium.transkip');
Route::put('/yudisium/data-yudisium/update/{id}',  'YudisiumController@update')->name('yudisium.update');
Route::get('/yudisium/data-yudisium/delete/{id}',  'YudisiumController@destroy')->name('yudisium.delete');
Route::get('/yudisium/data-yudisium/diterima/{yudisium}',  'YudisiumController@diterima')->name('yudisium.diterima');
Route::get('/yudisium/data-yudisium/ditolak/{yudisium}',  'YudisiumController@ditolak')->name('yudisium.ditolak');
Route::post('/yudisium/data-yudisium/nim/', 'YudisiumController@nim')->name('yudisium.nim');
// data kelulusan
Route::get('/yudisium/data-kelulusan', 'YudisiumController@kelulusan')->name('yudisium.kelulusan');

// Periode Yudisium
Route::get('/yudisium/periode-yudisium', 'PeriodeYudisiumController@index')->name('periode.index');
Route::post('/yudisium/periode-yudisium/store', 'PeriodeYudisiumController@store')->name('periode.store');
Route::put('/yudisium/periode-yudisium/update/{id}',  'PeriodeYudisiumController@update')->name('periode.update');
Route::get('/yudisium/periode-yudisium/delete/{id}',  'PeriodeYudisiumController@destroy')->name('periode.destroy');
Route::get('/yudisium/sk/', function () {
    return view('yudisium.periode.sk');
});

// controller cetak sk nya ku pindah kesini ya yok
Route::get('/yudisium/sk-yudisium/{periode}', 'PeriodeYudisiumController@cetaksk')->name('cetaksk');

// Cetak Draft Yudisium
// Route::get('/yudisium/sk-yudisium', 'YudisiumController@laporan')->name('cetaksk.index');
// Route::get('/yudisium/sk-yudisium/laporan/{periode}', 'YudisiumController@cetaksk')->name('cetaksk.laporan');
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
    Route::put('/tugas-akhir/downloadPermohonanSeminar',  'BerandaController@downloadPermohonanSeminar')->name('download.permohonanseminar');

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
    Route::put('/tugas-akhir/distribusi/downloadform', 'DistribusiController@downloadForm')->name('download.formdistribusi');

    //=========== PENDADARAN==============

    Route::get('/pendadaran/beranda', 'BerandaController@mahasiswaPendadaran')->name('mahasiswaPendadaran.beranda');
    Route::get('/pendadaran/pendaftaran', 'PendadaranMahasiswaController@create')->name('mahasiswaPendadaran.create');
    Route::post('/pendadaran/pendaftaran/store',  'PendadaranMahasiswaController@store')->name('mahasiswaPendadaran.store');
    Route::get('/pendadaran/nilai', 'NilaiPendadaranController@index')->name('mahasiswaPendadaran.nilai');

    //============= YUDISIUM =============

    Route::get('/yudisium/beranda', 'BerandaController@mahasiswaYudisium')->name('mahasiswaYudisium.beranda');
    Route::get('/yudisium/pendaftaran', 'YudisiumMahasiswaController@create')->name('mahasiswaYudisium.create');
    Route::post('/yudisium/pendaftaran/store',  'YudisiumMahasiswaController@store')->name('mahasiswaYudisium.store');
});


// ============= API UNSOED =================
Route::get('testing', function () {
    $response = Http::withHeaders([
        'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
        'secretkey' => 'Utb6T3g',
    ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/dosen/profil?emailunsoed=acep@unsoed.ac.id');
    $array = json_decode($response, true);
    // foreach ($array["data"] as $value) {
    //     return $value;
    // }
    $array_data = $array["data"];
    dd($array_data);
});

Route::get('curl/{nim}', 'APISIAController@data_mhs');

Route::get('mhs', function () {
    $response = Http::withHeaders([
        'X-API-KEY' => 'hVCK2D4V25rPEN8yIf9Qbf7XeNQcEYoqSckyl83J',
        'secretkey' => 'Utb6T3g',
    ])->get('https://soa.unsoed.ac.id/sia-sandbox/v1/mahasiswa/profil?nim=F1F014059');
    $array = json_decode($response, true);
    $array_data = $array["data"];
    dd($array_data);
});

Route::get('admin/master/api', 'APISIAController@Index')->name('master.api');
Route::get('admin/master/api/store', 'APISIAController@store')->name('api.store');

Route::get('spk/liat', 'SPKController@berkas');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

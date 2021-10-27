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
use App\Http\Controllers\MahasiswaTAController;
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

// Route::middleware(['cas.auth'])->group(function () {
//     Route::get('/', function () {
//         return view('guest.login');
//     });
// });

//=============== ROUTE ADMIN ====================
Route::middleware('admin')->prefix('admin')->group(function () {
	//Beranda
	Route::get('/beranda', 'BerandaController@index')->name('admin.route');

	//======= MASTER DATA ========
	// Route Tahun Akademik
	Route::get('/tahun-akademik', 'TahunAkademikController@index')->name('tahunAkademik.index');
	Route::post('/tahun-akademik/store', 'TahunAkademikController@store')->name('tahunAkademik.store');
	Route::get('/tahun-akademik/edit/{id}', 'TahunAkademikController@edit')->name('tahunAkademik.edit');
	Route::put('/tahun-akademik/update/{id}', 'TahunAkademikController@update')->name('tahunAkademik.update');
	Route::get('/tahun-akademik/destroy/{id}', 'TahunAkademikController@destroy')->name('tahunAkademik.destroy');

	// Route Jurusan
	Route::get('/jurusan', 'JurusanController@index');
	Route::post('/jurusan/store', 'JurusanController@store');
	Route::get('/jurusan/edit/{id}', 'JurusanController@edit')->name('jurusan.edit');
	Route::put('/jurusan/update/{id}', 'JurusanController@update')->name('jurusan.update');
	Route::get('/jurusan/destroy/{id}', 'JurusanController@destroy')->name('jurusan.destroy');

	// Route Data Ruangan
	Route::get('/data-ruang', 'RuangController@index');
	Route::post('/data-ruang/store', 'RuangController@store')->name('ruang.store');
	Route::put('/data-ruang/update/{id}', 'RuangController@update')->name('ruang.update');
	Route::get('/data-ruang/destroy/{id}', 'RuangController@destroy')->name('ruang.destroy');

	// Route Level User
	Route::get('/level-user', 'LevelController@index');
	Route::post('/level-user/store', 'LevelController@store')->name('level.store');
	Route::put('/level-user/update/{id}', 'LevelController@update')->name('level.update');
	Route::get('/level-user/delete/{id}', 'LevelController@destroy')->name('level.delete');

	//Route Data User
	Route::get('/data-user', 'UserController@index');
	//Route Data Dosen
	Route::get('/data-dosen', 'DosenController@index');
	//Route Data Komisi
	Route::get('/data-komisi', 'KomisiController@index');

	//=========== TUGAS AKHIR ================
	//status TA
	Route::get('/tugas-akhir/statusta', 'StatusTAController@index')->name('statusta.index');
	Route::post('/tugas-akhir/statusta/store', 'StatusTAController@store')->name('statusta.store');
	Route::put('/tugas-akhir/statusta/update/{id}', 'StatusTAController@update')->name('statusta.update');
	Route::get('/tugas-akhir/statusta/delete/{id}', 'StatusTAController@destroy')->name('statusta.delete');

	//data TA
	Route::get('/tugas-akhir/data-TA', 'TAController@index')->name('TA.index');
	Route::get('/tugas-akhir/detail-TA/{id}',  'TAController@show')->name('TA.show');
	Route::get('/tugas-akhir/data-TA/create', 'TAController@create')->name('TA.create');
	Route::post('/tugas-akhir/data-TA/store', 'TAController@store')->name('TA.store');
	Route::get('/tugas-akhir/data-TA/edit/{id}', 'TAController@edit')->name('TA.edit');
	Route::patch('/tugas-akhir/data-TA/update/{id}', 'TAController@update')->name('TA.update');
	Route::get('/tugas-akhir/data-TA/delete/{id}', 'TAController@destroy')->name('TA.delete');

	//data Konsul
	Route::get('/tugas-akhir/data-konsultasi', 'KonsultasiTAController@index')->name('konsultasi.index');
	Route::get('/tugas-akhir/data-konsultasi/{id}',  'KonsultasiTAController@show')->name('konsultasi.show');
	Route::get('/tugas-akhir/data-konsultasi/diterima/{konsultasiTA}', 'KonsultasiTAController@diterima')->name('konsultasi.diterima');
	Route::get('/tugas-akhir/data-pendadaran/ditolak/{konsultasiTA}', 'KonsultasiTAController@ditolak')->name('konsultasi.ditolak');

	//semprop
	Route::get('/tugas-akhir/semprop', 'SeminarProposalController@index')->name('semprop.index');
	Route::get('/tugas-akhir/semprop/edit/{id}', 'SeminarProposalController@edit')->name('semprop.edit');
	Route::get('/tugas-akhir/semprop/update/{id}', 'SeminarProposalController@update')->name('semprop.update');
	Route::get('/tugas-akhir/semprop/delete/{id}', 'SeminarProposalController@destroy')->name('semprop.delete');
	Route::get('/tugas-akhir/semprop/diterima/{seminarProposal}', 'SeminarProposalController@diterima')->name('semprop.diterima');
	Route::get('/tugas-akhir/semprop/ditolak/{SeminarProposal}', 'SeminarProposalController@ditolak')->name('semprop.ditolak');

	//semhas
	Route::get('/tugas-akhir/semhas',  'SeminarHasilController@index')->name('semhas.index');
	Route::get('/tugas-akhir/semhas/edit/{id}',  'SeminarHasilController@edit')->name('semhas.edit');
	Route::get('/tugas-akhir/semhas/update/{id}',  'SeminarHasilController@update')->name('semhas.update');
	Route::get('/tugas-akhir/semhas/delete/{id}',  'SeminarHasilController@destroy')->name('semhas.delete');
	Route::get('/tugas-akhir/semhas/diterima/{seminarHasil}',  'SeminarHasilController@diterima')->name('semhas.diterima');
	Route::get('/tugas-akhir/semhas/ditolak/{SeminarHasil}',  'SeminarHasilController@ditolak')->name('semhas.ditolak');

	//spk
	Route::get('/tugas-akhir/spk',  'SPKController@index')->name('spk.index');
	Route::post('/tugas-akhir/spk/store',  'SPKController@store')->name('spk.store');
	Route::put('/tugas-akhir/spk/download/{filename}',  'SPKController@download')->name('spk.download');
	Route::put('/tugas-akhir/spk/update/{id}',  'SPKController@update')->name('spk.update');
	Route::get('/tugas-akhir/spk/destroy/{id}',  'SPKController@destroy')->name('spk.destroy');
	Route::post('/tugas-akhir/spk/nim/',  'SPKController@nim')->name('spk.nim');
	Route::get('/tugas-akhir/spk/pdf/',  'SPKController@eksport')->name('spk.eksport');

	//nilai TA
	Route::get('/tugas-akhir/nilaita',  'NilaiTAController@index')->name('nilaita.index');
	Route::post('/tugas-akhir/nilaita/store',  'NilaiTAController@store')->name('nilaita.store');
	Route::put('/tugas-akhir/nilaita/update/{id}',  'NilaiTAController@update')->name('nilaita.update');
	Route::get('/tugas-akhir/nilaita/delete/{id}',  'NilaiTAController@destroy')->name('nilaita.delete');
	Route::post('/tugas-akhir/nilaita/nim/',  'NilaiTAController@nim')->name('nilaita.nim');

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
	Route::get('/pendadaran/data-pendadaran/diterima/{pendadaran}',  'PendadaranController@diterima')->name('pendadaran.diterima');
	Route::get('/pendadaran/data-pendadaran/ditolak/{pendadaran}',  'PendadaranController@ditolak')->name('pendadaran.ditolak');

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
});

//================= ROUTE DOSEN ===========================
Route::middleware('dosen')->prefix('dosen')->group(function () {
	//Beranda
	Route::get('/beranda', 'BerandaController@index')->name('dosen.beranda');

	// Route::get('/dosen/beranda', [BerandaController::class, 'index'])->name('dosen.beranda')->middleware([Dosen::class]);

	//=========== TUGAS AKHIR ================
	//status TA
	Route::get('/tugas-akhir/statusta', 'StatusTAController@index')->name('dosenstatusta.index');
	Route::post('/tugas-akhir/statusta/store', 'StatusTAController@store')->name('dosenstatusta.store');
	Route::put('/tugas-akhir/statusta/update/{id}', 'StatusTAController@update')->name('dosenstatusta.update');
	Route::get('/tugas-akhir/statusta/delete/{id}', 'StatusTAController@destroy')->name('dosenstatusta.delete');

	//data TA
	Route::get('/tugas-akhir/data-TA', 'TAController@index')->name('dosenTA.index');
	Route::get('/tugas-akhir/detail-TA/{id}',  'TAController@show')->name('dosenTA.show');
	Route::get('/tugas-akhir/data-TA/create', 'TAController@create')->name('dosenTA.create');
	Route::get('/tugas-akhir/data-TA/store', 'TAController@store')->name('dosenTA.store');
	Route::get('/tugas-akhir/data-TA/edit/{id}', 'TAController@edit')->name('dosenTA.edit');
	Route::get('/tugas-akhir/data-TA/update/{id}', 'TAController@update')->name('dosenTA.update');
	Route::get('/tugas-akhir/data-TA/delete/{id}', 'TAController@destroy')->name('dosenTA.delete');

	//data Konsul
	Route::get('/tugas-akhir/data-konsultasi', 'KonsultasiTAController@index')->name('dosenkonsultasi.index');
	Route::get('/tugas-akhir/data-konsultasi/{id}',  'KonsultasiTAController@show')->name('dosenkonsultasi.show');
	Route::get('/tugas-akhir/data-konsultasi/diterima/{konsultasiTA}', 'KonsultasiTAController@diterima')->name('dosenkonsultasi.diterima');
	Route::get('/tugas-akhir/data-pendadaran/ditolak/{konsultasiTA}', 'KonsultasiTAController@ditolak')->name('dosenkonsultasi.ditolak');

	//semprop
	Route::get('/tugas-akhir/semprop', 'SeminarProposalController@index')->name('dosensemprop.index');
	Route::get('/tugas-akhir/semprop/edit/{id}', 'SeminarProposalController@edit')->name('dosensemprop.edit');
	Route::get('/tugas-akhir/semprop/update/{id}', 'SeminarProposalController@update')->name('dosensemprop.update');
	Route::get('/tugas-akhir/semprop/delete/{id}', 'SeminarProposalController@destroy')->name('dosensemprop.delete');
	Route::get('/tugas-akhir/semprop/diterima/{seminarProposal}', 'SeminarProposalController@diterima')->name('dosensemprop.diterima');
	Route::get('/tugas-akhir/semprop/ditolak/{SeminarProposal}', 'SeminarProposalController@ditolak')->name('dosensemprop.ditolak');

	//semhas
	Route::get('/tugas-akhir/semhas',  'SeminarHasilController@index')->name('dosensemhas.index');
	Route::get('/tugas-akhir/semhas/edit/{id}',  'SeminarHasilController@edit')->name('dosensemhas.edit');
	Route::get('/tugas-akhir/semhas/update/{id}',  'SeminarHasilController@update')->name('dosensemhas.update');
	Route::get('/tugas-akhir/semhas/delete/{id}',  'SeminarHasilController@destroy')->name('dosensemhas.delete');
	Route::get('/tugas-akhir/semhas/diterima/{seminarHasil}',  'SeminarHasilController@diterima')->name('dosensemhas.diterima');
	Route::get('/tugas-akhir/semhas/ditolak/{SeminarHasil}',  'SeminarHasilController@ditolak')->name('dosensemhas.ditolak');

	//spk
	Route::get('/tugas-akhir/spk',  'SPKController@index')->name('dosenspk.index');
	Route::post('/tugas-akhir/spk/store',  'SPKController@store')->name('dosenspk.store');
	Route::put('/tugas-akhir/spk/download/{filename}',  'SPKController@download')->name('dosenspk.download');
	Route::put('/tugas-akhir/spk/update/{id}',  'SPKController@update')->name('dosenspk.update');
	Route::get('/tugas-akhir/spk/destroy/{id}',  'SPKController@destroy')->name('dosenspk.destroy');
	Route::post('/tugas-akhir/spk/nim/',  'SPKController@nim')->name('dosenspk.nim');

	//nilai TA
	Route::get('/tugas-akhir/nilaita',  'NilaiTAController@index')->name('dosennilaita.index');
	Route::post('/tugas-akhir/nilaita/store',  'NilaiTAController@store')->name('dosennilaita.store');
	Route::put('/tugas-akhir/nilaita/update/{id}',  'NilaiTAController@update')->name('dosennilaita.update');
	Route::get('/tugas-akhir/nilaita/delete/{id}',  'NilaiTAController@destroy')->name('dosennilaita.delete');
	Route::post('/tugas-akhir/nilaita/nim/',  'NilaiTAController@nim')->name('dosennilaita.nim');

	//=============== PENDADARAN ===================
	//status pendadaran
	Route::get('/pendadaran/status-pendadaran',  'StatusPendadaranController@index')->name('dosenstatuspendadaran.index');
	Route::post('/pendadaran/status-pendadaran/store',  'StatusPendadaranController@store')->name('dosenstatuspendadaran.store');
	Route::put('/pendadaran/status-pendadaran/update/{id}',  'StatusPendadaranController@update')->name('dosenstatuspendadaran.update');
	Route::get('/pendadaran/status-pendadaran/delete/{id}',  'StatusPendadaranController@destroy')->name('dosenstatuspendadaran.delete');

	//data pendadaran
	Route::get('/pendadaran/data-pendadaran',  'PendadaranController@index')->name('dosenpendadaran.index');
	Route::get('/pendadaran/data-pendadaran/create',  'PendadaranController@create')->name('dosenpendadaran.create');
	Route::post('/pendadaran/data-pendadaran/store',  'PendadaranController@store')->name('dosenpendadaran.store');
	Route::get('/pendadaran/data-pendadaran/edit/{id}',  'PendadaranController@edit')->name('dosenpendadaran.edit');
	Route::put('/pendadaran/data-pendadaran/update/{id}',  'PendadaranController@update')->name('dosenpendadaran.update');
	Route::get('/pendadaran/data-pendadaran/delete/{id}',  'PendadaranController@destroy')->name('dosenpendadaran.delete');
	Route::get('/pendadaran/data-pendadaran/diterima/{pendadaran}',  'PendadaranController@diterima')->name('dosenpendadaran.diterima');
	Route::get('/pendadaran/data-pendadaran/ditolak/{pendadaran}',  'PendadaranController@ditolak')->name('dosenpendadaran.ditolak');

	//nilai pendadaran
	Route::get('/pendadaran/nilai-pendadaran', 'NilaiPendadaranController@index')->name('dosennilaiPendadaran.index');
	Route::post('/pendadaran/nilai-pendadaran/store', 'NilaiPendadaranController@store')->name('dosennilaiPendadaran.store');
	Route::put('/pendadaran/nilai-pendadaran/update/{id}', 'NilaiPendadaranController@update')->name('dosennilaiPendadaran.update');
	Route::get('/pendadaran/nilai-pendadaran/delete/{id}', 'NilaiPendadaranController@destroy')->name('dosennilaiPendadaran.delete');
	Route::post('/pendadaran/nilai-pendadaran/nim/', 'NilaiPendadaranController@nim')->name('dosennilaipendadaran.nim');

	// berita acara pendadaran
	Route::get('/pendadaran/beritaacara',  'BeritaAcaraPendadaranController@index')->name('dosenberitaacarapendadaran.index');
	Route::post('/pendadaran/beritaacara/store',  'BeritaAcaraPendadaranController@store')->name('dosenberitaacarapendadaran.store');
	Route::put('/pendadaran/beritaacara/download/{filename}',  'BeritaAcaraPendadaranController@download')->name('dosenberitaacarapendadaran.download');
	Route::put('/pendadaran/beritaacara/update/{id}',  'BeritaAcaraPendadaranController@update')->name('dosenberitaacarapendadaran.update');
	Route::get('/pendadaran/beritaacara/destroy/{id}',  'BeritaAcaraPendadaranController@destroy')->name('dosenberitaacarapendadaran.destroy');
	Route::post('/pendadaran/beritaacara/nim/',  'BeritaAcaraPendadaranController@nim')->name('dosenberitaacarapendadaran.nim');


	//=================== YUDISIUM =========================
	//status yudisium
	Route::get('/yudisium/status-yudisium', 'StatusYudisiumController@index')->name('dosenstatusyudisium.index');
	Route::post('/yudisium/status-yudisium/store', 'StatusYudisiumController@store')->name('dosenstatusyudisium.store');
	Route::put('/yudisium/status-yudisium/update/{id}', 'StatusYudisiumController@update')->name('dosenstatusyudisium.update');
	Route::get('/yudisium/status-yudisium/delete/{id}', 'StatusYudisiumController@destroy')->name('dosenstatusyudisium.delete');

	//data yudisium
	Route::get('/yudisium/data-yudisium',  'YudisiumController@index')->name('dosenyudisium.index');
	Route::get('/yudisium/data-yudisium/create',  'YudisiumController@create')->name('dosenyudisium.create');
	Route::post('/yudisium/data-yudisium/store',  'YudisiumController@store')->name('dosenyudisium.store');
	Route::get('/yudisium/data-yudisium/edit/{id}',  'YudisiumController@edit')->name('dosenyudisium.edit');
	Route::put('/yudisium/data-yudisium/update/{id}',  'YudisiumController@update')->name('dosenyudisium.update');
	Route::get('/yudisium/data-yudisium/delete/{id}',  'YudisiumController@destroy')->name('dosenyudisium.delete');
	Route::get('/yudisium/data-yudisium/diterima/{yudisium}',  'YudisiumController@diterima')->name('dosenyudisium.diterima');
	Route::get('/yudisium/data-yudisium/ditolak/{yudisium}',  'YudisiumController@ditolak')->name('dosenyudisium.ditolak');
	Route::get('/yudisium/data-yudisium/ulang/{yudisium}',  'YudisiumController@ulang')->name('dosenyudisium.ulang');
	Route::get('/yudisium/data-yudisium/selesai/{yudisium}',  'YudisiumController@selesai')->name('dosenyudisium.selesai');

	// sk kelulusan
	Route::get('/yudisium/sk', 'SKController@index')->name('dosensk.index');
	Route::post('/yudisium/sk/store', 'SKController@store')->name('dosensk.store');
	Route::put('/yudisium/sk/download/{filename}', 'SKController@download')->name('dosensk.download');
	Route::put('/yudisium/sk/update/{id}', 'SKController@update')->name('dosensk.update');
	Route::get('/yudisium/sk/destroy/{id}', 'SKController@destroy')->name('dosensk.destroy');
	Route::post('/yudisium/sk/nim/', 'SKController@nim')->name('dosensk.nim');
});

Route::middleware('mahasiswa')->prefix('mahasiswa')->group(function () {
	//Beranda
	Route::get('/beranda', 'BerandaController@index')->name('admin.route');

	//================= ROUTE MAHASISWA =========================
	Route::get('/beranda', function () {
		return view('mahasiswa.menu');
	})->name('mahasiswa.menu');

	//Tugas Akhir
	Route::get('/mahasiswa/tugas-akhir/beranda', [MahasiswaTAController::class, 'beranda'])->name('mahasiswaTA.beranda');
	Route::get('/mahasiswa/tugas-akhir/proposal', [MahasiswaTAController::class, 'proposal'])->name('mahasiswaTA.proposal');
	Route::post('/mahasiswa/tugas-akhir/pengajuan', [MahasiswaTAController::class, 'pengajuan'])->name('mahasiswaTA.pengajuan');

	//Tugas Akhir
	// Route::get('/mahasiswa/tugas-akhir/proposal', function () {
	//     return view('mahasiswa.TA.pages.pengajuan');
	// });
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
	Route::get('/mahasiswa.pendadaran/beranda', function () {
		return view('mahasiswa.pendadaran.pages.beranda');
	});
	Route::get('/mahasiswa.pendadaran/pendaftaran', function () {
		return view('mahasiswa.pendadaran.pages.pendaftaran');
	});
	Route::get('/mahasiswa.pendadaran/jadwal', function () {
		return view('mahasiswa.pendadaran.pages.jadwal');
	});
	Route::get('/mahasiswa.pendadaran/nilai', function () {
		return view('mahasiswa.pendadaran.pages.nilai');
	});

	//Yudisium
	Route::get('/mahasiswa.yudisium/beranda', function () {
		return view('mahasiswa.yudisium.pages.beranda');
	});
	Route::get('/mahasiswa.yudisium/pendaftaran', function () {
		return view('mahasiswa.yudisium.pages.pendaftaran');
	});
	Route::get('/mahasiswa.yudisium/jadwal', function () {
		return view('mahasiswa.yudisium.pages.jadwal');
	});
});


//================= ROUTE KOMISI ====================
Route::get('/komisi/beranda', [BerandaController::class, 'index'])->name('komisi.beranda')->middleware([Komisi::class]);


//================= ROUTE KAJUR ===========================
Route::get('/kajur/beranda', [BerandaController::class, 'index'])->name('kajur.beranda')->middleware([Kajur::class]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

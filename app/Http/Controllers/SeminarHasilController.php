<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use File;
use App\Models\TA;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Ruang;
use App\Models\Status;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\SeminarProposal;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $data = array(
                'semhas_all' => SeminarHasil::latest()->get(),
            );
        } else {
            $data = array(
                'semhas_all' => SeminarHasil::latest()->get(),
                'semhas_dosen' => SeminarHasil::with(['ta'])->whereHas('ta', function ($q) use ($dosen_id) {
                    $q->where('pembimbing1_id', $dosen_id->id)
                        ->orWhere('pembimbing2_id', $dosen_id->id);
                })->latest()->get(),
                'semhas_jurusan' => SeminarHasil::with(['ta.mahasiswa'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                    $q->where('jurusan_id', $dosen_id->jurusan_id);
                })->latest()->get(),
            );
        }

        return view('TA.semhasTA.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_semhas = new SeminarHasil();
        $semhas = SeminarHasil::get();
        $jurusan = jurusan::all();
        $mhs = Mahasiswa::all();
        $Ruang = Ruang::get();
        return view('TA.semhasTA.create', compact('data_semhas', 'semhas', 'mhs', 'Ruang', 'jurusan'));
    }
    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '7')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        if ($request->file('laporan')) {
            $jamMulai = $request->jamMulai;
            $jamSelesai = $request->jamSelesai;
            $ruang = $request->ruang;
            $tanggal =  Carbon::parse($request->tanggal)->isoFormat('Y-M-D');
            $today = Carbon::now()->addDays(3)->isoFormat('Y-M-D');
            // dd($today);
            if ($tanggal >= $today) {
                $semhasCount = SeminarHasil::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                $semproCount = SeminarProposal::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                $seminarCount = Seminar::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                // dd($semhasCount);
                // dd($semproCount);
                // dd($seminarCount);

                if (!$semhasCount && !$semproCount && !$seminarCount) {
                    $ta_id = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
                    $nim = $ta_id->mahasiswa->nim;
                    $file = $request->file('laporan');
                    $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('laporan')->storeAS('public/assets/file/LaporanTA/', $filename);
                    $data = [
                        'ta_id' => $request->ta_id,
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruang_id' => $ruang,
                        'status' => '1',
                        'no_surat' => $request->no_surat,
                        'laporan' => $filename,
                    ];
                    $cek = SeminarHasil::create($data);
                    $taAll = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
                    $status = array(
                        'status_id' => 8,
                        'judulTA' => $request->judul,
                    );
                    // dd($taAll);
                    $taAll->update($status);
                    Alert::success('Berhasil', 'Pengajuan Seminar Hasil telah Berhasil');
                } else {
                    Alert::warning('Gagal', 'Pengajuan Seminar Hasil Gagal Ditambahkan, Ruangan Sudah Digunakan');
                }
            } else {
                Alert::warning('Gagal', 'Pengajuan Seminar Hasil diajukan minimal 3 Hari Sebelum Pelaksanaan Seminar');
            }
        } else {
            $data['doc'] = NULL;
        }
        return redirect(route('semhas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $taAll = SeminarHasil::with(['mahasiswa'])->where('ta_id', $id)->get()->first();
        // dd($taAll);
        $status = array(
            'no_surat' => $request->no_surat,
        );
        if ($taAll->update($status)) {
            Alert::success('Berhasil', 'Berhasil Tambah Nomer Berita Acara Seminar Hasil Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Nomer Berita Acara Seminar Hasil Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semhas = SeminarHasil::find($id);
        $ruang = Ruang::get();
        return view('TA.semhasTA.edit', compact('semhas', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seminar_hasil = SeminarHasil::find($id);
        // $hapus = $seminar_hasil->beritaacara;
        // dd($hapus);
        $data = $request->all();
        $data = [
            'beritaacara' => $request->beritaacara_dosen,
        ];

        if ($request->file('beritaacara')) {
            $semhas = SeminarHasil::with(['ta.mahasiswa'])->where('ta_id', $request->ta_id)->latest()->get();
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('beritaacara');
            $filename = 'Berita Acara Dosen SEMHAS' . '_' . $seminar_hasil->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Semhas TA/', $filename);
            $data = [
                'beritaacara' => $filename,
            ];
            // dd($data);
        } else {
            $data['beritaacara'] = $seminar_hasil->beritaacara;
        }
        // File::delete(public_path('storage/assets/file/Berita Acara Semhas TA/' . $hapus . ''));
        $seminar_hasil->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Hasil');
        return redirect(route('semhas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semhas = SeminarHasil::find($id);
        $taAll = TA::with(['mahasiswa'])->where('id', $semhas->ta->id)->get()->first();
        File::delete(public_path('storage/assets/file/Berita Acara Semhas TA/' . $semhas->beritaacara . ''));
        $semhas->delete();
        $status = array(
            'status_id' => 6,
        );
        $taAll->update($status);
        Alert::success('Berhasil', 'Berhasil hapus data Seminar Hasil');
        return back();
    }

    public function diterima(SeminarHasil $seminarHasil)
    {
        $data = array(
            'status' => 1,
        );
        $seminarHasil->update($data);
        Alert::success('Berhasil', 'Pengajuan Seminar Hasil Diterima');
        return back();
    }
    public function ditolak(SeminarHasil $SeminarHasil)
    {
        $data = array(
            'status' => 2,
        );
        //dd($data);
        $SeminarHasil->update($data);
        Alert::warning('Gagal', 'Pengajuan Seminar Hasil Ditolak');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        if(File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''))){
            return response()->file(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''));
        }else{
            Alert::warning('Gagal', 'File Tidak Tersedia');
        return back();
        }
    }
    public function eksport(Request $request, $id)
    {
        $id = $request->route('id');
        $ta_id =  SeminarHasil::with(['TA.mahasiswa.Jurusan', 'TA.Dosen1', 'TA.Dosen2', 'ruang'])->where('ta_id', $id)->where('no_surat', '!=', null)->get()->first();
        $dosen = Dosen::where('jurusan_id', $ta_id->mahasiswa->jurusan_id)->where('isKajur', '1')->get()->first();
        $spk = Carbon::parse($ta_id->tanggal)->isoFormat('D MMMM YYYY');
        $hari = Carbon::parse($ta_id->tanggal)->isoFormat('dddd D MMMM YYYY');
        $jamMulai = Carbon::parse($ta_id->jamMulai)->isoFormat('H:mm');
        $jamSelesai = Carbon::parse($ta_id->jamSelesai)->isoFormat('H:mm');
        $taAll = TA::with(['mahasiswa'])->where('id', $ta_id->ta_id)->get()->first();
        // dd($spk );
        $pdf = PDF::loadView('TA.semhasTA.berkas', ['ta_id' => $ta_id, 'dosen' => $dosen, 'hari' => $hari, 'spk' => $spk, 'jamMulai' => $jamMulai, 'jamSelesai' => $jamSelesai])->setPaper('a4');
        $filename = 'Berita Acara Seminar Hasil' . '_' . $ta_id->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semhas TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            // dd($data );
            $ta_id->update($data);
            $status = array(
                'status_id' => 9,
            );
            // dd($status);
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Seminar Hasil');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Seminar Hasil Gagal Ditambahkan');
        }
        return back();
    }

    public function berkas()
    {
        return view('TA.semhasTA.berkas');
    }
}

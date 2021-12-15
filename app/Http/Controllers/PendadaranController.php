<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Status;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\StatusPendadaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RuangPendadaran;
use App\Models\TahunAkademik;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use File;
use PDF;

class PendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusPendadaran::latest()->get();
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $pendadaran = Pendadaran::with(['mahasiswa', 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'statusPendadaran'])->latest()->get();
            $acc_pendadaran = Pendadaran::with(['mahasiswa', 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'statusPendadaran'])->where('statuspendadaran_id', 2)->latest()->get();
        } elseif (auth()->user()->level_id == 3) {
            $pendadaran = Pendadaran::with(['statusPendadaran'])->whereHas('statusPendadaran', function ($q) use ($dosen_id) {
                $q->where('penguji1_id', $dosen_id->id)
                    ->orWhere('penguji2_id', $dosen_id->id)
                    ->orWhere('penguji3_id', $dosen_id->id)
                    ->orWhere('penguji4_id', $dosen_id->id);
            })->latest()->get();
        } elseif (auth()->user()->level_id == 1) {

            $pendadaran = Pendadaran::with(['statusPendadaran'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('statusPendadaran', function ($q) use ($dosen_id) {
                $q->where('penguji1_id', $dosen_id->id)
                    ->orWhere('penguji2_id', $dosen_id->id)
                    ->orWhere('penguji3_id', $dosen_id->id)
                    ->orWhere('penguji4_id', $dosen_id->id);
            })->latest()->get();
            $acc_pendadaran = Pendadaran::with('statusPendadaran')->where('statuspendadaran_id', 3)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
        } elseif (auth()->user()->level_id == 5) {

            $pendadaran = Pendadaran::with(['statusPendadaran'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('statusPendadaran', function ($q) use ($dosen_id) {
                $q->where('penguji1_id', $dosen_id->id)
                    ->orWhere('penguji2_id', $dosen_id->id)
                    ->orWhere('penguji3_id', $dosen_id->id)
                    ->orWhere('penguji4_id', $dosen_id->id);
            })->latest()->get();
            $acc_pendadaran = Pendadaran::with('statusPendadaran')->where('statuspendadaran_id', 4)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
        }
        return view('pendadaran.dataPendadaran.index', compact('pendadaran', 'status', 'acc_pendadaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('pendadaran.store');
        $button = 'Tambah';
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $data_pendadaran = new Pendadaran();
        $pendadaran = Pendadaran::get();
        $dosen = Dosen::get();
        $status = StatusPendadaran::latest()->get();
        $jurusan = jurusan::get();
        $ruang = RuangPendadaran::get();
        return view('pendadaran.dataPendadaran.form', compact('action', 'tahun', 'status', 'button', 'data_pendadaran', 'pendadaran', 'jurusan', 'dosen', 'ruang'));
    }
    public function nim(Request $request)
    {
        $mahasiswa = Mahasiswa::Has('TA')->whereHas('TA', function ($q) use ($request) {
            $q->where('status_id', '10');
        })->whereDoesntHave('Pendadaran')->orHas('Pendadaran')->whereHas('Pendadaran', function ($q) {
            $q->where('statuspendadaran_id', '1');
        })->where('jurusan_id', $request->id)->get();
        // $mahasiswa = Mahasiswa::whereDoesntHave('TA')->where('jurusan_id', $request->id)->get();
        // dd($mahasiswa);
        return response()->json($mahasiswa, 200);
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
        $jamMulai = $request->jamMulai;
        $jamSelesai = $request->jamSelesai;
        $ruang = $request->ruang;
        $tanggal =  Carbon::parse($request->tanggal)->isoFormat('Y-M-DD');
        $today = Carbon::now()->addDays(3)->isoFormat('Y-M-DD');
        // dd($tanggal >= $today);

        if ($tanggal >= $today) {
            $pendadaranCount = Pendadaran::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where('tanggal', '=', $tanggal)
                        ->where('jamMulai', '>=', $jamMulai)
                        ->where('jamSelesai', '<', $jamMulai)
                        ->where('ruangpendadaran_id', '=', $ruang);
                })
                    ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('jamMulai', '<', $jamSelesai)
                            ->where('jamSelesai', '>=', $jamSelesai)
                            ->where('tanggal', '=', $tanggal)
                            ->where('ruangpendadaran_id', '=', $ruang);
                    });;
            })->count();
            // dd($pendadaranCount);
            if (!$pendadaranCount) {
                $mhs_id = Mahasiswa::where('id', $request->nim)->get()->first();
                $nim = $mhs_id->nim;
                //  dd($nim);
                if ($request->file('berkas')) {
                    $file = $request->file('berkas');
                    $filename = 'Pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('berkas')->storeAS('public/assets/file/Pendadaran/', $filename);
                    $data = [
                        'mhs_id' => $request->nim,
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruangPendadaran_id' => $ruang,
                        'statuspendadaran_id' => $request->statuspendadaran_id,
                        'no_surat' => $request->no_surat,
                        'thnAkad_id' => 1,
                        'berkas' => $filename,
                        'penguji1_id' => $request->penguji1_id,
                        'penguji2_id' => $request->penguji2_id,
                        'penguji3_id' => $request->penguji3_id,
                        'penguji4_id' => $request->penguji4_id,
                    ];
                }
                // dd($data);
                Pendadaran::create($data);
                Alert::success('Berhasil', 'Berhasil Menambahkan Data Ujian Pendadaran');
            } else {
                Alert::warning('Gagal', 'Pengajuan Ujian Pendadaran Gagal Ditambahkan, Ruangan Sudah Digunakan');
            }
        } else {
            Alert::warning('Gagal', 'Pengajuan Ujian Pendadaran diajukan minimal 3 Hari Sebelum Pelaksanaan Ujian Pendadaran');
        }
        return redirect(route('pendadaran.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendadaran $pendadaran)
    {
        //
    }
    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Pendadaran/' . $filename . ''))) {
            return response()->File(public_path('storage/assets/file/Pendadaran/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function downloadberita($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berita Acara Pendadaran/' . $filename . ''))) {
            return response()->File(public_path('storage/assets/file/Berita Acara Pendadaran/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = route('pendadaran.update', $id);
        $button = 'Edit';
        $pendadaran = Pendadaran::get();
        $data_pendadaran = Pendadaran::with(['mahasiswa', 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'statusPendadaran'])->find($id);
        // dd( $data_pendadaran->statuspendadaran->id);
        $dosen = Dosen::get();
        $status = StatusPendadaran::latest()->get();
        $ruang = RuangPendadaran::get();
        // dd($ruang);
        $jurusan = jurusan::get();
        return view('pendadaran.dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'status', 'jurusan', 'dosen', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendadaran = Pendadaran::with(['mahasiswa'])->find($id);
        $data = $request->all();
        $jamMulai = $request->jamMulai;
        $jamSelesai = $request->jamSelesai;
        $ruang = $request->ruang;
        $tanggal =  Carbon::parse($request->tanggal)->isoFormat('Y-M-DD');
        $today = Carbon::now()->addDays(3)->isoFormat('Y-M-DD');
        // dd($tanggal >= $today);
        if ($request->file('beritaacara')) {
            $nim = $pendadaran->mahasiswa->nim;
            $berita = $request->file('beritaacara');
            $beritaacara = 'Berita Acara Pendadaran Terbaru' . '_' . $nim . '_' . time() . '.' . $berita->getClientOriginalExtension();
            $path1 = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Pendadaran/', $beritaacara);
            $data = [
                'statuspendadaran_id' => 5,
                'beritaacara' => $beritaacara,
            ];
            $pendadaran->update($data);
            Alert::success('Berhasil', 'Berhasil Menambahkan Berita Acara Pendadaran');
            return redirect(route('pendadaran.index'));
        }
        if ($tanggal >= $today) {
            $pendadaranCount = Pendadaran::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where('tanggal', '=', $tanggal)
                        ->where('jamMulai', '>=', $jamMulai)
                        ->where('jamSelesai', '<', $jamMulai)
                        ->where('ruangpendadaran_id', '=', $ruang);
                })
                    ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('jamMulai', '<', $jamSelesai)
                            ->where('jamSelesai', '>=', $jamSelesai)
                            ->where('tanggal', '=', $tanggal)
                            ->where('ruangpendadaran_id', '=', $ruang);
                    });;
            })->count();
            // dd($pendadaranCount);
            if (!$pendadaranCount) {
                $nim = $pendadaran->mahasiswa->nim;
                if ($request->file('berkas') && $request->file('beritaacara')) {
                    $file = $request->file('berkas');
                    $filename = 'Pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('berkas')->storeAS('public/assets/file/Pendadaran/', $filename);
                    $berita = $request->file('beritaacara');
                    $beritaacara = 'Berita Acara Pendadaran' . '_' . $nim . '_' . time() . '.' . $berita->getClientOriginalExtension();
                    $path1 = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Pendadaran/', $beritaacara);
                    $data = [
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruangPendadaran_id' => $ruang,
                        'statuspendadaran_id' => $request->statuspendadaran_id,
                        'no_surat' => $request->no_surat,
                        'berkas' => $filename,
                        'beritaacara' => $beritaacara,
                        'penguji1_id' => $request->penguji1_id,
                        'penguji2_id' => $request->penguji2_id,
                        'penguji3_id' => $request->penguji3_id,
                        'penguji4_id' => $request->penguji4_id,
                    ];
                } elseif ($request->file('beritaacara')) {
                    $berita = $request->file('beritaacara');
                    $beritaacara = 'Berita Acara Pendadaran Terbaru' . '_' . $nim . '_' . time() . '.' . $berita->getClientOriginalExtension();
                    $path1 = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Pendadaran/', $beritaacara);
                    $data = [
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruangPendadaran_id' => $ruang,
                        'statuspendadaran_id' => 5,
                        'no_surat' => $request->no_surat,
                        'beritaacara' => $beritaacara,
                        'penguji1_id' => $request->penguji1_id,
                        'penguji2_id' => $request->penguji2_id,
                        'penguji3_id' => $request->penguji3_id,
                        'penguji4_id' => $request->penguji4_id,
                    ];
                } elseif ($request->file('berkas')) {
                    $file = $request->file('berkas');
                    $filename = 'Pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('berkas')->storeAS('public/assets/file/Pendadaran/', $filename);
                    $data = [
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruangPendadaran_id' => $ruang,
                        'statuspendadaran_id' => $request->statuspendadaran_id,
                        'no_surat' => $request->no_surat,
                        'berkas' => $filename,
                        'penguji1_id' => $request->penguji1_id,
                        'penguji2_id' => $request->penguji2_id,
                        'penguji3_id' => $request->penguji3_id,
                        'penguji4_id' => $request->penguji4_id,
                    ];
                } else {
                    $data = [
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruangPendadaran_id' => $ruang,
                        'statuspendadaran_id' => $request->statuspendadaran_id,
                        'no_surat' => $request->no_surat,
                        'penguji1_id' => $request->penguji1_id,
                        'penguji2_id' => $request->penguji2_id,
                        'penguji3_id' => $request->penguji3_id,
                        'penguji4_id' => $request->penguji4_id,
                    ];
                }
                // dd($data);
                $pendadaran->update($data);
                Alert::success('Berhasil', 'Berhasil Mengubah Data Pendadaran');
            } else {
                Alert::warning('Gagal', 'Pengajuan Ujian Pendadaran Gagal Ditambahkan, Ruangan Sudah Digunakan');
            }
        } else {
            Alert::warning('Gagal', 'Pengajuan Ujian Pendadaran diajukan minimal 3 Hari Sebelum Pelaksanaan Ujian Pendadaran');
        }
        return redirect(route('pendadaran.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendadaran = Pendadaran::find($id);
        $pendadaran->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Pendadaran');
        return back();
    }
    public function verifikasi(Request $request, $id)
    {
        $pendadaran = Pendadaran::with(['mahasiswa'])->find($id);
        $data = $request->all();
        $pendadaran->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Status data Pendadaran');
        return redirect(route('pendadaran.index'));
    }
    public function eksport(Request $request, $id)
    {
        $id = $request->route('id');
        $pendadaran = Pendadaran::with(['mahasiswa.jurusan', 'ruangPendadaran'])->where('no_surat', '!=', null)->find($id);
        $dosen = Dosen::where('jurusan_id', $pendadaran->mahasiswa->jurusan_id)->where('isKajur', '1')->get()->first();
        $hari = Carbon::parse($pendadaran->tanggal)->isoFormat('dddd, D MMMM YYYY');
        $spk = Carbon::now()->isoFormat('D MMMM YYYY');
        $jamMulai = Carbon::parse($pendadaran->jamMulai)->isoFormat('H:mm');
        $jamSelesai = Carbon::parse($pendadaran->jamSelesai)->isoFormat('H:mm');
        $pdf = PDF::loadView('pendadaran.dataPendadaran.berkas', ['pendadaran' => $pendadaran, 'dosen' => $dosen, 'hari' => $hari, 'spk' => $spk, 'jamMulai' => $jamMulai, 'jamSelesai' => $jamSelesai])->setPaper('a4');

        $filename = 'Berita Acara Pendadaran' . '_' . $pendadaran->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Pendadaran/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            // dd($pendadaran);
            $pendadaran->update($data);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Ujian Pendadaran');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Ujian Pendadaran Gagal Ditambahkan');
        }
        return back();
    }
}

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
use File;

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
        } elseif (auth()->user()->level_id == 1 || 5) {

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
        }


        return view('pendadaran.dataPendadaran.index', compact('pendadaran','status'));
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
        foreach ($pendadaran as $value) {
            $penguji1_id = $value->penguji1_id;
            $penguji2_id = $value->penguji2_id;
            $penguji3_id = $value->penguji3_id;
            $penguji4_id = $value->penguji4_id;
            $status_id = $value->statuspendadaran_id;
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jrsn_id = $mahasiswa->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;

            $penguji1 = Dosen::where('id', $penguji1_id)->first();
            $namaPenguji1 = $penguji1->nama;
            $penguji2 = Dosen::where('id', $penguji2_id)->first();
            $namaPenguji2 = $penguji2->nama;
            $penguji3 = Dosen::where('id', $penguji3_id)->first();
            $namaPenguji3 = $penguji3->nama;
            $penguji4 = Dosen::where('id', $penguji4_id)->first();
            $namaPenguji4 = $penguji4->nama;
            $stts = StatusPendadaran::where('id', $status_id)->first();
            $ketStatus = $stts->status;
        }
        return view('pendadaran.dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pendadaran::create($request->all());
        $data = $request->all();

        if (Pendadaran::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Izin');
        } else {
            Alert::warning('Gagal', 'Data Izin Gagal Ditambahkan');
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
            return response()->file(public_path('storage/assets/file/Pendadaran/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function downloadberita($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berita Acara Pendadaran/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/Berita Acara Pendadaran/' . $filename . ''));
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
        // dd( $data_pendadaran->statuspendadaran->status);
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
        dd($data);
        $jamMulai = $request->jamMulai;
        $jamSelesai = $request->jamSelesai;
        $ruang = $request->ruang;
        $tanggal =  Carbon::parse($request->tanggal)->isoFormat('Y-M-DD');
        // $tanggal = date('Y-m-d', strtotime($request->tanggal));
        $today = Carbon::now()->addDays(3)->isoFormat('Y-M-DD');
        // dd($tanggal >= $today);

        if ($tanggal >= $today) {
            $pendadaranCount = Pendadaran::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where('tanggal', '=', $tanggal)
                        ->where('jamMulai', '>=', $jamMulai)
                        ->where('jamSelesai', '<', $jamMulai)
                        ->where('ruang_id', '=', $ruang);
                })
                    ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai , $ruang) {
                        $query->where('jamMulai', '<', $jamSelesai)
                            ->where('jamSelesai', '>=', $jamSelesai)
                            ->where('tanggal', '=', $tanggal)
                            ->where('ruang_id', '=', $ruang);
                    });;
            })->count();
            if (!$pendadaranCount) {
                // $ta_id = Pendadaran::with(['mahasiswa'])->where('id', $id)->get()->first();
                $nim = $pendadaran->mahasiswa->nim;
                dd($nim);
                $file = $request->file('berkas');
                $filename = 'Pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $request->file('berkas')->storeAS('public/assets/file/Pendadaran/', $filename);
                $berita = $request->file('beritaacara');
                $beritaacara = 'Berita Acara Pendadaran' . '_' . $nim . '_' . time() . '.' . $berita->getClientOriginalExtension();
                $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Pendadaran/', $beritaacara);
                $data = [
                    'ta_id' => $request->ta_id,
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
                $pendadaran->update($data);
                Alert::success('Berhasil', 'Berhasil Mengubah Status data Pendadaran');
            } else {
                Alert::warning('Gagal', 'Pengajuan Seminar Proposal Gagal Ditambahkan, Ruangan Sudah Digunakan');
            }
        } else {
            Alert::warning('Gagal', 'Pengajuan Seminar Proposal Gagal Ditambahkan, Ruangan Sudah Digunakan');
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
    public function verifikasi(Request $request,$id)
    {
        $pendadaran = Pendadaran::with(['mahasiswa'])->find($id);
        $data = $request->all();
        $pendadaran->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Status data Pendadaran');
    }
    public function eksport(Request $request, $id)
    {
        $id = $request->route('id');
        $ta_id =  SeminarProposal::with(['TA.mahasiswa.Jurusan', 'TA.Dosen1', 'TA.Dosen2', 'ruang'])->where('id', $id)->where('no_surat', '!=', null)->get()->first();
        $dosen = Dosen::where('jurusan_id', $ta_id->ta->mahasiswa->jurusan_id)->where('isKajur', '1')->get()->first();
        $hari = Carbon::parse($ta_id->tanggal)->isoFormat('dddd D MMMM YYYY');
        $spk = Carbon::parse($ta_id->tanggal)->isoFormat('D MMMM YYYY');
        $jamMulai = Carbon::parse($ta_id->jamMulai)->isoFormat('H:mm');
        $jamSelesai = Carbon::parse($ta_id->jamSelesai)->isoFormat('H:mm');
        // dd($jamMulai);
        $taAll = TA::with(['mahasiswa'])->where('id', $ta_id->ta_id)->get()->first();
        $pdf = PDF::loadView('TA.sempropTA.berkas', ['ta_id' => $ta_id, 'dosen' => $dosen, 'hari' => $hari, 'spk' => $spk, 'jamMulai' => $jamMulai, 'jamSelesai' => $jamSelesai])->setPaper('a4');

        $filename = 'Berita Acara Seminar Proposal' . '_' . $ta_id->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semprop TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            $ta_id->update($data);
            $status = array(
                'status_id' => 7,
            );
            // dd($status);
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Seminar Proposal');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Seminar Proposal Gagal Ditambahkan');
        }
        return back();
    }
}

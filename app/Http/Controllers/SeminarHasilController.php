<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Ruang;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
use PDF;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarHasil $seminarHasil)
    {
        //
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
        $data = $request->all();
        $data = [
            // 'ta_id' => $request->ta_id,
            // 'laporan' => $request->laporan,
            // 'beritaacara' => $request->beritaacara,
            'beritaacara_dosen' => $request->beritaacara_dosen,
            // 'jamMulai' => $request->jamMulai,
            // 'jamSelesai' => $request->jamSelesai,
            // 'tanggal' => $request->tanggal,
            // 'ruang_id' => $request->ruang_id,
            // 'status' => $request->status,
        ];

        if ($request->file('beritaacara_dosen')) {
            $semhas = SeminarHasil::with(['ta.mahasiswa'])->where('ta_id', $request->ta_id)->latest()->get();
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('beritaacara_dosen');
            $filename = 'Berita Acara Dosen SEMHAS' . '_' . $seminar_hasil->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara_dosen')->storeAS('public/assets/file/Berita Acara Dosen Semhas TA', $filename);
            $data = [
                // 'ta_id' => $request->ta_id,
                // 'laporan' => $request->laporan,
                // 'beritaacara' => $request->beritaacara,
                'beritaacara_dosen' => $filename,
                // 'jamMulai' => $request->jamMulai,
                // 'jamSelesai' => $request->jamSelesai,
                // 'tanggal' => $request->tanggal,
                // 'ruang_id' => $request->ruang_id,
                // 'status' => $request->status,
            ];
            // dd($data);
        } else {
            $data['beritaacara'] = $seminar_hasil->beritaacara;
        }

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
        $semhas->delete();
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
        return response()->download(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''));
    }
    public function eksport(Request $request, $id)
    {
        $ta_id = $request->route('id');

        $semhas = SeminarHasil::with(['TA.mahasiswa'])->where('ta_id', $request->route('id'))->get()->first();
        $taAll = TA::with(['mahasiswa'])->where('id', $request->route('id'))->get()->first();
        // dd($semhas->ta->mahasiswa->nim);

        $data = ['ta_id' => $ta_id, 'semhas' => $semhas];
        $pdf = PDF::loadView('TA.SPK.download', $data);

        $filename = 'Berita Acara Seminar Hasil' . '_' . $semhas->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semhas TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            // dd($data );
            $semhas->update($data);
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
}

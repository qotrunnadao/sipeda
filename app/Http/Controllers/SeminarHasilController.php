<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Ruang;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
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
        $semhas = SeminarHasil::latest()->get();

        return view('TA.semhasTA.index', compact('semhas'));
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
            'ta_id' => $request->ta_id,
            'laporan' => $request->laporan,
            'beritaacara' => $request->beritaacara,
            'beritaacara_dosen' => $request->beritaacara_dosen,
            'jamMulai' => $request->jamMulai,
            'jamSelesai' => $request->jamSelesai,
            'tanggal' => $request->tanggal,
            'ruang_id' => $request->ruang_id,
            'status' => $request->status,
        ];

        //dd($data);
        if ($request->file('beritaacara')) {
            $semhas = SeminarHasil::latest()->get();
            $mhs_id = Mahasiswa::where('id', $request->mahasiswa)->get()->first();
            // dd($mhs_id);
            $nim = $mhs_id->nim;
            $file = $request->file('beritaacara');
            $filename = 'beritaAcara' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/beritaacara', $filename);
            $data = [
                'ta_id' => $request->ta_id,
                'laporan' => $request->laporan,
                'beritaacara' => $request->beritaacara,
                'beritaacara_dosen' => $request->beritaacara_dosen,
                'jamMulai' => $request->jamMulai,
                'jamSelesai' => $request->jamSelesai,
                'tanggal' => $request->tanggal,
                'ruang_id' => $request->ruang_id,
                'status' => $request->status,
            ];
        } else {
            $data['beritaacara'] = $seminar_hasil->beritaacara;
        }

        $seminar_hasil->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Proposal');
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
    public function ditolak(SeminarHasil $seminarHasil)
    {
        $data = array(
            'status' => 2,
        );
        $seminarHasil->update($data);
        Alert::warning('Berhasil', 'Pengajuan Seminar Hasil Ditolak');
        return back();
    }
}

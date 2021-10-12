<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use App\Models\NilaiPendadaran;
use App\Models\StatusNilai;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiPendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendadaran = Pendadaran::latest()->get();
        $statusnilai = StatusNilai::latest()->get();
        $nilai = NilaiPendadaran::latest()->get();
        foreach ($nilai as $value) {
            $pendadaran_id = $value->pendadaran_id;
            $pdd = Pendadaran::where('id', $pendadaran_id)->first();
            $mahasiswa_id = $pdd->mhs_id;
            $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
            $namaMahasiswa = $mhs_id->nama;
            $nim = $mhs_id->nim;
            $jrsn_id = $mhs_id->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;
        }
        return view('nilaiPendadaran.index', compact('statusnilai', 'nilai', 'namaMahasiswa', 'nim', 'namaJurusan', 'pendadaran'));
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
        $data = $request->all();
        NilaiPendadaran::create($data);
        if (NilaiPendadaran::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Jurusan');
        } else {
            Alert::warning('Gagal', 'Data Jurusan Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiPendadaran $nilaiPendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiPendadaran $nilaiPendadaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = NilaiPendadaran::find($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status Nilai');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = NilaiPendadaran::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spk = SPK::latest()->get();
        foreach ($spk as $value) {
            $ta_id = $value->TA_id;
            $ta = TA::where('id', $ta_id)->first();
            $mahasiswa_id = $ta->mahasiswa_id;
            $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
            $namaMahasiswa = $mhs_id->nama;
            $nim = $mhs_id->nim;
            $jrsn_id = $mhs_id->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;
        }
        return view('SPK.index', compact('spk', 'namaMahasiswa', 'nim', 'namaJurusan'));
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
        $cek = SPK::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Jurusan');
        } else {
            Alert::warning('Gagal', 'Data Jurusan Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function show(SPK $sPK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function edit(SPK $sPK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = SPK::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Jurusan');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = SPK::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $sk = SK::latest()->get();
        foreach ($sk as $value) {
            $yudisium_id = $value->yudisium_id;
            $yudisium = Yudisium::where('id', $yudisium_id)->first();
            $mahasiswa_id = $yudisium->mhs_id;
            $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
            $namaMahasiswa = $mhs_id->nama;
            $nim = $mhs_id->nim;
            $jrsn_id = $mhs_id->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;
        }
        return view('SK.index', compact('sk', 'namaMahasiswa', 'nim', 'namaJurusan', 'jurusan'));
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
        SK::create($request->all());
        $data = $request->all();

        if (SK::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Izin');
        } else {
            Alert::warning('Gagal', 'Data Izin Gagal Ditambahkan');
        }

        return redirect(route('sk.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function show(SK $sK)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function edit(SK $sK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SK $sK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = SK::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

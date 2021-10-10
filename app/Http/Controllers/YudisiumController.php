<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use RealRashid\SweetAlert\Facades\Alert;

class YudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yudisium = Yudisium::latest()->get();
        foreach ($yudisium as $value) {
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jurusan_id = $mahasiswa->jurusan_id;
            $jurusan = Jurusan::where('id', $jurusan_id)->first();
            $namaJurusan = $jurusan->namaJurusan;
            $thnAkad_id = $value->thnAkad_id;
            $thn = TahunAkademik::where('id', $thnAkad_id)->first();
            $thnAkad = $thn->ket;
        }
        return view('dataYudisium.index', compact('yudisium', 'thnAkad', 'namaMahasiswa', 'nim', 'namaJurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('yudisium.store');
        $button = 'Tambah';
        $data_yudisium = new Yudisium();
        $yudisium = Yudisium::get();
        foreach ($yudisium as $value) {
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jurusan_id = $mahasiswa->jurusan_id;
            $jurusan = Jurusan::where('id', $jurusan_id)->first();
            $namaJurusan = $jurusan->namaJurusan;
            $thnAkad_id = $value->thnAkad_id;
            $thn = TahunAkademik::where('id', $thnAkad_id)->first();
            $thnAkad = $thn->ket;
        }
        return view('dataYudisium.form', compact('action', 'button', 'data_yudisium', 'yudisium', 'thnAkad', 'namaMahasiswa', 'nim', 'namaJurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Yudisium::create($request->all());
        $data = $request->all();

        if (Yudisium::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Izin');
        } else {
            Alert::warning('Gagal', 'Data Izin Gagal Ditambahkan');
        }

        return redirect(route('yudisium.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function show(Yudisium $yudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yudisium = Yudisium::get();
        $data_yudisium = Yudisium::find($id);
        $action = url('/yudisium/data-yudisium/update');
        $button = 'Edit';
        foreach ($yudisium as $value) {
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jurusan_id = $mahasiswa->jurusan_id;
            $jurusan = Jurusan::where('id', $jurusan_id)->first();
            $namaJurusan = $jurusan->namaJurusan;
            $thnAkad_id = $value->thnAkad_id;
            $thn = TahunAkademik::where('id', $thnAkad_id)->first();
            $thnAkad = $thn->ket;
        }
        return view('dataYudisium.form', compact('action', 'button', 'data_yudisium', 'yudisium', 'thnAkad', 'namaMahasiswa', 'nim', 'namaJurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $yudisium = Yudisium::find($id);
        $data = $request->all();
        $yudisium->update($data);
        Alert::success('Berhasil', 'Berhasil edit data Yudisium');
        return redirect('/yudisium/data-yudisium');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yudisium = Yudisium::find($id);
        $yudisium->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Yudisium');
        return back();
    }

    public function diterima(Yudisium $yudisium)
    {
        $data = array(
            'status' => 1,
        );
        $yudisium->update($data);
        Alert::success('Berhasil', 'Pengajuan Yudisium Diterima');
        return back();
    }
    public function ditolak(Yudisium $yudisium)
    {
        $data = array(
            'status' => 2,
        );
        $yudisium->update($data);
        Alert::warning('Berhasil', 'Pengajuan Yudisium Ditolak');
        return back();
    }
}

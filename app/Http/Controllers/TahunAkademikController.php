<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use App\Models\Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();
        $tahun_akademik = TahunAkademik::latest()->get();
        return view('admin.master.tahunAkademik', compact('tahun_akademik', 'semester'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $cek = TahunAkademik::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Tahun Akademik');
        } else {
            Alert::warning('Gagal', 'Data Tahun Akademik Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TahunAkademik  $tahunAkademik
     * @return \Illuminate\Http\Response
     */
    public function show(TahunAkademik $tahunAkademik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TahunAkademik  $tahunAkademik
     * @return \Illuminate\Http\Response
     */
    public function edit(TahunAkademik $tahunAkademik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TahunAkademik  $tahunAkademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = TahunAkademik::where('id', $id)->first();
        $data = $request->all();
        $ubah = $value->update($data);
        // dd($database);
        if ($ubah == true) {
            Alert::success('Berhasil', 'Berhasil Ubah Data Tahun Akademik');
        } else {
            Alert::warning('Gagal', 'Data Tahun Akademik Gagal Diubah');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TahunAkademik  $tahunAkademik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahunAkademik = TahunAkademik::find($id);
        $hapus = $tahunAkademik->delete();
        if ($hapus == true) {
            Alert::success('Berhasil', 'Berhasil hapus data Tahun Akademik');
        } else {
            Alert::warning('Gagal', 'Data Tahun Akademik Gagal DIhapus');
        }
        return back();
    }
}

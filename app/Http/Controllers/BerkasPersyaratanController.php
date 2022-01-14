<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerkasPersyaratan;
use RealRashid\SweetAlert\Facades\Alert;

class BerkasPersyaratanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'berkas' => BerkasPersyaratan::get(),
        );
        return view('admin.master.berkas_persyaratan', $data);
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
        $cek = BerkasPersyaratan::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Persyaratan');
        } else {
            Alert::warning('Gagal', 'Data Persyaratan Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BerkasPersyaratan  $berkasPersyaratan
     * @return \Illuminate\Http\Response
     */
    public function show(BerkasPersyaratan $berkasPersyaratan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BerkasPersyaratan  $berkasPersyaratan
     * @return \Illuminate\Http\Response
     */
    public function edit(BerkasPersyaratan $berkasPersyaratan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BerkasPersyaratan  $berkasPersyaratan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = BerkasPersyaratan::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Persyaratan');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BerkasPersyaratan  $berkasPersyaratan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berkas = BerkasPersyaratan::find($id);
        $berkas->delete();
        Alert::success('Berhasil', 'Berhasil hapus Data Persyaratan');
        return back();
    }
}

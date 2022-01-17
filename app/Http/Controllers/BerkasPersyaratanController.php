<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BerkasPersyaratan;
use RealRashid\SweetAlert\Facades\Alert;
use File;
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
    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berkas Persyaratan/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/Berkas Persyaratan/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
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
        if ($request->file('berkas')) {
            $file = $request->file('berkas');
            $filename = 'Berkas Persyaratan Pengajuan' . ' ' . $request->nama_berkas . '.' . $file->getClientOriginalExtension();
            // dd($filename);
            $path = $request->file('berkas')->storeAS('public/assets/file/Berkas Persyaratan/', $filename);
            $data = [
                'nama_berkas' => $request->nama_berkas,
                'berkas' => $filename,
            ];
            $cek = BerkasPersyaratan::create($data);
            if ($cek == true) {
                Alert::success('Berhasil', 'Berhasil Tambah Data Persyaratan');
                return back();
            } else {
                Alert::warning('Gagal', 'Data Persyaratan Gagal Ditambahkan');
                return back();
            }
            // dd($data);\
        } else {
            Alert::warning('Gagal', 'Data Persyaratan Gagal Ditambahkan');
            return back();
        }
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
        $hapus = $value->berkas;
        if ($request->file('berkas')) {
            $file = $request->file('berkas');
            $filename = 'Berkas Persyaratan Pengajuan' . ' ' . $request->nama_berkas . '.' . $file->getClientOriginalExtension();
            $path = $request->file('berkas')->storeAS('public/assets/file/Berkas Persyaratan/', $filename);
            $data = [
                'nama_berkas' => $request->nama_berkas,
                'berkas' => $filename,
            ];
            // dd($data);
            File::delete(public_path('storage/assets/file/Berkas Persyaratan/' . $hapus . ''));
        } else {
            $data['berkas'] = $hapus;
        }
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
        $value = BerkasPersyaratan::find($id);
        $hapus = $value->berkas;
        File::delete(public_path('storage/assets/file/Berkas Persyaratan/' . $hapus . ''));
        $value->delete();
        Alert::success('Berhasil', 'Berhasil hapus Data Persyaratan');
        return back();
    }
}

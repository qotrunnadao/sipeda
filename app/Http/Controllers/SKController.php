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
        $yudisiumAll = Yudisium::with(['mahasiswa'])->get();
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
        return view('SK.index', compact('sk', 'namaMahasiswa', 'nim', 'namaJurusan', 'jurusan', 'yudisium', 'mhs_id', 'yudisiumAll'));
    }

    public function nim(Request $request)
    {
        $yudisiumAll = Yudisium::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '1')->get();
        // dd($taAll);
        return response()->json($yudisiumAll, 200);
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
        if ($request->file('fileSK')) {
            $file = $request->file('fileSK');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSK')->storeAS('public/assets/sk', $filename);
            $data = [
                'yudisium_id' => $request->yudisium_id,
                'fileSK' => $filename,
            ];
            $cek = SK::create($data);
        } else {
            $data['doc'] = NULL;
        }
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data SK');
        } else {
            Alert::warning('Gagal', 'Data SK Gagal Ditambahkan');
        }
        return back();
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

    public function download($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/sk/' . $filename . ''));
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = SK::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data SK');
        return back();
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
        Alert::success('Berhasil', 'Berhasil hapus SK');
        return back();
    }
}

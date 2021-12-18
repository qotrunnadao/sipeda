<?php

namespace App\Http\Controllers;

use App\Models\PeriodeYudisium;
use App\Models\Yudisium;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class PeriodeYudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = PeriodeYudisium::latest()->get();
        // $tanggal = Carbon::parse($periode->first()->tanggal)->isoFormat('Y-M-DD');
        return view('yudisium.periode.index',  compact('periode'));
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
        // dd($data);
        $cek = PeriodeYudisium::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Periode Yudisium');
        } else {
            Alert::warning('Gagal', 'Data Periode Yudisium Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodeYudisium $periodeYudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodeYudisium $periodeYudisium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = PeriodeYudisium::where('id', $id)->first();
        $data = $request->all();
        $hapus = $value->fileSK;
        // dd($value);
        if ($request->file('fileSK')) {
            $file = $request->file('fileSK');
            $filename = 'Surat Kelulusan Yudisium Fakultas Teknik' . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSK')->storeAS('public/assets/file/sk/', $filename);
            $data = [
                'fileSK' => $filename,
                'namaPeriode' => $request->namaPeriode,
                'tanggal' => $request->tanggal,
                'nosurat' => $request->nosurat,
                'aktif' => $request->aktif,
            ];
            File::delete(public_path('storage/assets/file/sk/' . $hapus . ''));
            // dd($data);
        } else {
            $data['fileSK'] = NULL;
        }
        $ubah = $value->update($data);
        if ($ubah == true) {
            $yudisium = Yudisium::with(['mahasiswa'])->where('periode_id', $id)->get()->first();
            $status = array(
                'status_id' => 5,
            );
            $yudisium->update($status);
            Alert::success('Berhasil', 'Berhasil Ubah Data Periode Yudisium');
        } else {
            Alert::warning('Gagal', 'Data Periode Yudisium Gagal Diubah');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $periodeYudisium = PeriodeYudisium::find($id);
        $hapus = $periodeYudisium->delete();
        if ($hapus == true) {
            Alert::success('Berhasil', 'Berhasil hapus data Periode Yudisium');
        } else {
            Alert::warning('Gagal', 'Data Periode Yudisium Gagal DIhapus');
        }
        return back();
    }
}

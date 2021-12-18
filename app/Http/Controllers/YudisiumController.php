<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use App\Models\SK;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\StatusYudisium;
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
        return view('yudisium.dataYudisium.index', compact('yudisium'));
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
        $status = StatusYudisium::get();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $jurusan = jurusan::get();
        return view('yudisium.dataYudisium.form', compact('action', 'button', 'data_yudisium', 'status', 'tahun', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "berkas" => "mimes:pdf|max:10000"
        ]);
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
        $button = 'Edit';
        $action = url('/yudisium/data-yudisium/update');
        $status = StatusYudisium::get();
        return view('yudisium.dataYudisium.form', compact('action', 'button', 'data_yudisium', 'status'));
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
        dd($yudisium);
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
            'status_id' => 2,
        );
        $yudisium->update($data);
        Alert::success('Berhasil', 'Pengajuan Yudisium Diterima');
        return back();
    }
    public function ditolak(Yudisium $yudisium)
    {
        $data = array(
            'status_id' => 3,
        );
        $yudisium->update($data);
        Alert::warning('Berhasil', 'Pengajuan Yudisium Ditolak');
        return back();
    }

    public function ulang(Yudisium $yudisium)
    {
        $data = array(
            'status_id' => 4,
        );
        $yudisium->update($data);
        Alert::success('Berhasil', 'Pengajuan yudisium boleh diajukan lagi');
        return back();
    }

    public function selesai(Yudisium $yudisium)
    {
        if (SK::where('id', $yudisium->id) != null) {
            $data = array(
                'status_id' => 4,
            );
            $yudisium->update($data);
        }
    }
}

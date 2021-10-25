<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Dosen;
use App\Models\jurusan;
use App\Models\Status;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        $jurusan = jurusan::get();
        return view('TA.dataTA.index', compact('tugas_akhir'));

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.TA.dataTA.index', compact('tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus', 'status'));
        // } elseif (auth()->user()->level_id == 1) {
        //     return view('komisi.TA.dataTA.index', compact('tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus', 'status'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.TA.dataTA.index', compact('tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus', 'status'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('TA.store');
        $button = 'Tambah';
        $data_ta = new TA();
        $tugas_akhir = TA::get();
        $dosen = Dosen::get();
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        return view('TA.dataTA.form', compact('action', 'button', 'data_ta', 'tugas_akhir', 'status', 'dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TA::create($request->all());
        $data = $request->all();

        if (TA::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Izin');
        } else {
            Alert::warning('Gagal', 'Data Izin Gagal Ditambahkan');
        }

        return redirect(route('TA.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_list = TA::find($id);
        $data = [
            'data_TA' => $data_list
        ];
        // passing data Izin yang didapat
        return view('TA.dataTA.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_ta = TA::find($id);
        $action = url('/tugas-akhir/data-TA/update');
        $button = 'Edit';
        $dosen = Dosen::get();
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        foreach ($tugas_akhir as $value) {
            $dosen1_id = $value->pembimbing1_id;
            $dosen2_id = $value->pembimbing2_id;
            $status_id = $value->status_id;
            $dosen1 = Dosen::where('id', $dosen1_id)->first();
            $nama_dosen1 = $dosen1->nama;
            $dosen2 = Dosen::where('id', $dosen2_id)->first();
            $nama_dosen2 = $dosen2->nama;
            $stts = Status::where('id', $status_id)->first();
            $ketStatus = $stts->ket;
        }
        return view('TA.dataTA.form', compact('action', 'button', 'data_ta', 'tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus', 'status', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tugas_akhir = TA::find($id);
        $data = $request->all();
        $tugas_akhir->update($data);
        Alert::success('Berhasil', 'Berhasil edit data Izin');
        return redirect(route('TA.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas_akhir = TA::find($id);
        $tugas_akhir->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Pendadaran');
        return back();
    }
}

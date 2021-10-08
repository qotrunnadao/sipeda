<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Dosen;
use App\Models\Status;
use Illuminate\Http\Request;

class TAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas_akhir = TA::latest()->get();
        foreach ($tugas_akhir as $value) {
            $dosen1_id = $value->pembimbing1_id;
            $dosen2_id = $value->pembimbing2_id;
            $status_id = $value->status_id;
            $dosen1 = Dosen::where('id', $dosen1_id)->first();
            $nama_dosen1 = $dosen1->nama;
            $dosen2 = Dosen::where('id', $dosen2_id)->first();
            $nama_dosen2 = $dosen2->nama;
            $status = Status::where('id', $status_id)->first();
            $ketStatus = $status->ket;
        }
        return view('dataTA.index', compact('tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus'));
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
        //
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
        return view('dataTA.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function edit(TA $tA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TA $tA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function destroy(TA $tA)
    {
        //
    }
}

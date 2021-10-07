<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiTA;
use Illuminate\Http\Request;

class KonsultasiTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'konsultasi' => KonsultasiTA::latest()->get(),
        );
        return view('konsultasiTA.index', $data);
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
     * @param  \App\Models\KonsultasiTA  $konsultasiTA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_list = KonsultasiTA::find($id);
        $data = [
            'konsultasi' => $data_list
        ];
        // passing data Izin yang didapat
        return view('konsultasiTA.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonsultasiTA  $konsultasiTA
     * @return \Illuminate\Http\Response
     */
    public function edit(KonsultasiTA $konsultasiTA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonsultasiTA  $konsultasiTA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonsultasiTA $konsultasiTA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonsultasiTA  $konsultasiTA
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonsultasiTA $konsultasiTA)
    {
        //
    }
}

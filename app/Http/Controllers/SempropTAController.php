<?php

namespace App\Http\Controllers;

use App\Models\JenisSeminar;
use App\Models\Mahasiswa;
use App\Models\Ruang;
use App\Models\Seminar;
use App\Models\TA;
use Illuminate\Http\Request;

class SempropTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semprop = Seminar::where('jenis_id', 2)->latest()->get();
        foreach ($semprop as $value) {
            $ta_id = $value->ta_id;
            $ta = TA::where('id', $ta_id)->first();
            $judul = $ta->judulTA;
            $mhs_id = $ta->mahasiswa_id;
            $mahasiswa_id = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa  = $mahasiswa_id->nama;

            $jenis_id = $value->jenis_id;
            $jenis = JenisSeminar::where('id', $jenis_id)->first();
            $jenisSeminar = $jenis->jenis;

            $ruang_id = $value->ruang_id;
            $ruang = Ruang::where('id', $ruang_id)->first();
            $namaRuang = $ruang->namaRuang;
        }

        return view('sempropTA.index', compact('semprop', 'judul', 'namaMahasiswa', 'jenisSeminar', 'namaRuang'));
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
     * @param  \App\Models\SempropTA  $sempropTA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SempropTA  $sempropTA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SempropTA  $sempropTA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SempropTA  $sempropTA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\StudiAkhir;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Mahasiswa::studi_akhir()->id == 1) {
            $data = array(
                'mahasiswa' => Mahasiswa::where('jumlah_sks' >= 120)->get(),
            );
            return view('TA.mahasiswa.beranda', $data);
        }
        if (Mahasiswa::studi_akhir()->id == 2) {
            $data = array(
                'mahasiswa' => Mahasiswa::where('status', 'selesai TA')->get(),
            );
            return view('pendadaran.mahasiswa.beranda', $data);
        } else {
            $data = array(
                'mahasiswa' => Mahasiswa::where('status', 'selesai pendadaran')->get(),
            );
            return view('yudisium.mahasiswa.beranda', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}

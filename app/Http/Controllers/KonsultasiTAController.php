<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\KonsultasiTA;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KonsultasiTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsultasi = KonsultasiTA::with('TA.mahasiswa.jurusan')->latest()->get();
        return view('TA.konsultasiTA.index', compact('konsultasi'));

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.TA.konsultasiTA.index', compact('konsultasi'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.TA.konsultasiTA.index', compact('konsultasi'));
        // }
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

        $konsultasi = KonsultasiTA::find($id);
        return view('TA.konsultasiTA.detail', compact('konsultasi'));

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.TA.konsultasiTA.detail', compact('konsultasi', 'namaMahasiswa', 'nim'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.TA.konsultasiTA.detail', compact('konsultasi', 'namaMahasiswa', 'nim'));
        // }
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

    public function diterima(KonsultasiTA  $konsultasiTA)
    {
        $data = array(
            'verifikasiDosen' => 1,
        );
        $konsultasiTA->update($data);
        Alert::success('Berhasil', 'Pengajuan Izin Diterima');
        return back();
    }
    public function ditolak(KonsultasiTA  $konsultasiTA)
    {
        $data = array(
            'verifikasiDosen' => 2,
        );
        $konsultasiTA->update($data);
        Alert::warning('Berhasil', 'Pengajuan Izin Ditolak');
        return back();
    }
}

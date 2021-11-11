<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\TA;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $konsultasi = KonsultasiTA::with('dosen')->get();
            $tugas_akhir = TA::with(['konsultasiTA'])->latest()->get();
        } else {
            $konsultasi = KonsultasiTA::with('dosen')->where('dosen_id', $dosen_id->id)->get();

            $tugas_akhir = TA::with(['konsultasiTA'])->whereHas('konsultasiTA', function ($q) use ($dosen_id) {
                $q->where('dosen_id', $dosen_id->id);
            })->latest()->get();
            // dd($tugas_akhir);
        }
        return view('TA.konsultasiTA.index', compact('tugas_akhir'));
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
    public function show(Request $request, $id)
    {
        $ta_id = $request->id;
        $konsultasi = KonsultasiTA::with(['TA.mahasiswa'])->where('ta_id', $ta_id)->latest()->get();
        // dd($konsultasi);
        return view('TA.konsultasiTA.detail', compact('konsultasi'));
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
        Alert::success('Berhasil', 'Pengajuan Konsultasi Diterima');
        return back();
    }
    public function ditolak(KonsultasiTA  $konsultasiTA)
    {
        $data = array(
            'verifikasiDosen' => 2,
        );
        $konsultasiTA->update($data);
        Alert::warning('Berhasil', 'Pengajuan Konsultasi Ditolak');
        return back();
    }
}

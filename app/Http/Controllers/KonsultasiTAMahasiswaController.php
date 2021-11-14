<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\TA;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\KonsultasiTA;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KonsultasiTAMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        $tugas_akhir = TA::with(['dosen1', 'dosen2'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        // $tugas_akhir = TA::find($id)->with(['dosen1', 'dosen2'])->where('status_id', '3')->first();
        $konsultasi = KonsultasiTA::with(['dosen'])->where('ta_id', $tugas_akhir->id)->select('*')->latest()->get();
        // dd($konsultasi);
        return view('mahasiswa.TA.pages.konsultasi', compact('TA', 'konsultasi', 'tugas_akhir'));
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
        $cek = KonsultasiTA::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Konsultasi TA');
        } else {
            Alert::warning('Gagal', 'Data Konsultasi TA Gagal Ditambahkan');
        }
        return back();
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
    public function update(Request $request, $id)
    {
        $value = KonsultasiTA::where('id', $id)->first();
        // $data = $request->all();
        $data = [
            'ta_id' => $request->ta_id,
            'dosen_id' => $request->dosen_id,
            'hasil' => $request->hasil,
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            // 'ket' => $request->ket,
            'verifikasiDosen' => 0,
        ];
        // dd($data);
        $ubah = $value->update($data);
        if ($ubah == true) {
            Alert::success('Berhasil', 'Berhasil Ubah Data Konsultasi');
        } else {
            Alert::warning('Gagal', 'Data Konsultasi Gagal Diubah');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonsultasiTA  $konsultasiTA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konsultasi = KonsultasiTA::find($id);
        $konsultasi->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Konsultasi');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Status;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class PendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendadaran = Pendadaran::latest()->get();
        foreach ($pendadaran as $value) {
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jurusan_id = $mahasiswa->jurusan_id;
            $jurusan = Jurusan::where('id', $jurusan_id)->first();
            $namaJurusan = $jurusan->namaJurusan;

            $penguji1_id = $value->penguji1_id;
            $penguji2_id = $value->penguji2_id;
            $penguji3_id = $value->penguji3_id;
            $penguji4_id = $value->penguji4_id;
            $status_id = $value->status_id;
            $thnAkad_id = $value->thnAkad_id;

            $penguji1 = Dosen::where('id', $penguji1_id)->first();
            $namaPenguji1 = $penguji1->nama;
            $penguji2 = Dosen::where('id', $penguji2_id)->first();
            $namaPenguji2 = $penguji2->nama;
            $penguji3 = Dosen::where('id', $penguji3_id)->first();
            $namaPenguji3 = $penguji3->nama;
            $penguji4 = Dosen::where('id', $penguji4_id)->first();
            $namaPenguji4 = $penguji4->nama;
            $status = Status::where('id', $status_id)->first();
            $ketStatus = $status->ket;
            $thn = TahunAkademik::where('id', $thnAkad_id)->first();
            $thnAkad = $thn->ket;
        }
        return view('dataPendadaran.index', compact('pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'thnAkad', 'ketStatus', 'namaMahasiswa', 'nim', 'namaJurusan'));
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
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendadaran $pendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendadaran $pendadaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendadaran $pendadaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendadaran $pendadaran)
    {
        //
    }
}

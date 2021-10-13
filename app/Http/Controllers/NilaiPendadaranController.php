<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use App\Models\NilaiPendadaran;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class NilaiPendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $pendadaran = Pendadaran::with(['mahasiswa'])->get();
        $statusnilai = StatusNilai::all();
        $nilai = DB::table('nilai_pendadaran')
            ->join('pendadaran', 'pendadaran.id', '=', 'nilai_pendadaran.pendadaran_id')
            ->join('mahasiswa', 'pendadaran.mhs_id', '=', 'mahasiswa.id')
            ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.id')
            ->select('nilai_pendadaran.statusnilai_id', 'nilai_pendadaran.nilaiAngka', 'nilai_pendadaran.nilaiHuruf', 'mahasiswa.nama', 'mahasiswa.nim', 'jurusan.namaJurusan', 'nilai_pendadaran.created_at', 'nilai_pendadaran.id')
            // ->where('ta.mahasiswa_id', '=', $id)
            ->latest()
            ->get();


        // dd($spk);
        return view('nilaiPendadaran.index', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
    }

    public function nim(Request $request)
    {
        $pendadaranAll = Pendadaran::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('statuspendadaran_id', '1')->get();
        // dd($taAll);
        return response()->json($pendadaranAll, 200);
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
        $data = array(
            'pendadaran_id' => $request->pendadaran_id,
            'nilaiAngka' => $request->nilaiAngka,
            'nilaiHuruf' => $request->nilaiHuruf,
            'statusnilai_id' => $request->statusnilai_id
        );
        $cek = NilaiPendadaran::create($data);
        if ($cek = true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Jurusan');
        } else {
            Alert::warning('Gagal', 'Data Jurusan Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiPendadaran $nilaiPendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiPendadaran $nilaiPendadaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = NilaiPendadaran::find($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status Nilai');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiPendadaran  $nilaiPendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = NilaiPendadaran::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

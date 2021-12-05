<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use App\Models\NilaiPendadaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $nilai = NilaiPendadaran::With('pendadaran.mahasiswa.jurusan')->latest()->get();
        if (Auth::user()->level_id == 4) {
            return view('mahasiswa.pendadaran.pages.nilai', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
        } else {
            return view('pendadaran.nilaiPendadaran.index', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
        }

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.pendadaran.nilaiPendadaran.index', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
        // } elseif (auth()->user()->level_id == 1) {
        //     return view('komisi.pendadaran.nilaiPendadaran.index', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.pendadaran.nilaiPendadaran.index', compact('nilai', 'jurusan', 'pendadaran', 'statusnilai'));
        // }
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

<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Jurusan;
use App\Models\NilaiTA;
use App\Models\Mahasiswa;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class NilaiTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $taAll = TA::with(['mahasiswa'])->get();
        $statusnilai = StatusNilai::all();
        $nilai = NilaiTA::With('TA.mahasiswa.jurusan')->latest()->get();

        return view('TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));
        // } elseif (auth()->user()->level_id == 1) {
        //     return view('komisi.TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));
        // }
    }

    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '1')->get();
        return response()->json($taAll, 200);
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

        $data = [
            'ta_id' => $request->ta_id,
            'nilaiAngka' => $request->nilaiAngka,
            'nilaiHuruf' => $request->nilaiHuruf,
            'statusnilai_id' => $request->statusnilai_id,
        ];
        $cek = NilaiTA::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Nilai Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Nilai Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiTA  $nilaiTA
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiTA $nilaiTA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiTA  $nilaiTA
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiTA $nilaiTA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiTA  $nilaiTA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = NilaiTA::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status Nilai');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiTA  $nilaiTA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = NilaiTA::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

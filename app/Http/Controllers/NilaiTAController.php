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
        $nilai = DB::table('nilaita')
            ->join('ta', 'ta.id', '=', 'nilaita.ta_id')
            ->join('mahasiswa', 'ta.mahasiswa_id', '=', 'mahasiswa.id')
            ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.id')
            ->select('nilaita.statusnilai_id', 'nilaita.nilaiAngka', 'nilaita.nilaiHuruf', 'mahasiswa.nama', 'mahasiswa.nim', 'jurusan.namaJurusan', 'nilaita.created_at', 'nilaita.id')
            // ->where('ta.mahasiswa_id', '=', $id)
            ->latest()
            ->get();


        // dd($spk);
        return view('nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));
    }

    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '1')->get();
        // dd($taAll);
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
        // dd($data);
        if ($request->file('filenilaiTA')) {
            $file = $request->file('filenilaiTA');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('filenilaiTA')->storeAS('public/assets/file/nilaiTA', $filename);
            $data = [
                'filenilaiTA' => $filename,
                'ta_id' => $request->ta_id,
                'nilaiAngka' => $request->nilaiAngka,
                'nilaiHuruf' => $request->nilaiHuruf,
                'statusnilai_id' => $request->statusnilai_id,
            ];
            $cek = NilaiTA::create($data);
        } else {
            $data['doc'] = NULL;
        }
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

<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\TA;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\KonsultasiTA;
use Illuminate\Database\Eloquent\Builder;
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
        $jurusan = jurusan::all();
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $konsultasi = KonsultasiTA::with('dosen')->get();
            $tugas_akhir = TA::with(['konsultasiTA', 'dosen1', 'dosen2'])->where('status_id', '>=', '5')->latest()->get();
            // dd($tugas_akhir);
        } else {
            $konsultasi = KonsultasiTA::with('dosen')->where('dosen_id', $dosen_id->id)->get();

            $tugas_akhir = TA::with(['konsultasiTA'])->whereHas('konsultasiTA', function ($q) use ($dosen_id) {
                $q->where('dosen_id', $dosen_id->id);
            })->latest()->get();
        }
        return view('TA.konsultasiTA.index', compact('tugas_akhir', 'jurusan'));
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
    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '>=','5')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
    }
    public function dosen(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->where('ta_id',$request->id)->get();
        // dd($taAll);
        return response()->json($taAll, 200);
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
    public function show(Request $request, $id)
    {
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        $ta_id = $request->id;
        if (auth()->user()->level_id == 2) {
            $konsultasi = KonsultasiTA::with(['TA.mahasiswa'])->where('ta_id', $ta_id)->latest()->get();
            $acc_konsultasi = KonsultasiTA::with(['TA.mahasiswa'])->where('ta_id', $ta_id)->where('verifikasiDosen', 0)->latest()->get();
        } else {
            $konsultasi = KonsultasiTA::with(['TA.mahasiswa'])->where('ta_id', $ta_id)->where('dosen_id', $dosen_id->id)->latest()->get();
            $acc_konsultasi = KonsultasiTA::with(['TA.mahasiswa'])->where('ta_id', $ta_id)->where('dosen_id', $dosen_id->id)->where('verifikasiDosen', 0)->latest()->get();
        }
        // dd($konsultasi);
        return view('TA.konsultasiTA.detail', compact('acc_konsultasi', 'konsultasi'));
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
    public function update(Request $request,$id)
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

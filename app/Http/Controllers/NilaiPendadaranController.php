<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\NilaiHuruf;
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

        if (Auth::user()->level_id == 4) {
            $NilaiHuruf = NilaiHuruf::latest()->get();
            $id = Auth::User()->id;
            $user_id = User::where('id', $id)->get()->first();
            $mhs_id = Mahasiswa::with(['user'])->where('user_id', $user_id->id)->get()->first();
            $Pendadaran = Pendadaran::with(['mahasiswa'])->where('mhs_id', $mhs_id->id)->latest()->first();
            $pendadaran = Pendadaran::with(['mahasiswa'])->where('mhs_id', $mhs_id->id)->where('statuspendadaran_id', '6')->latest()->get()->first();
            // dd($Pendadaran);
            if ($pendadaran) {
                $nilai = NilaiPendadaran::with('Pendadaran', 'NilaiHuruf')->where('pendadaran_id', $pendadaran->id)->latest()->get();
            } else {
                $pendadaran = Pendadaran::with(['mahasiswa'])->where('mhs_id', $mhs_id->id)->latest()->get()->first();
                $nilai = NilaiPendadaran::with('Pendadaran', 'NilaiHuruf')->where('pendadaran_id', $pendadaran->id)->where('statusnilai_id', '2')->latest()->get();
            }
            return view('mahasiswa.pendadaran.pages.nilai', compact('Pendadaran', 'nilai', 'NilaiHuruf', 'pendadaran'));
        } else {
            $id = Auth::User()->id;
            $user_id = User::where('id', $id)->get()->first();
            $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
            // dd($dosen_id->id);
            $NilaiHuruf = NilaiHuruf::latest()->get();
            $jurusan = jurusan::all();
            $Pendadaran = Pendadaran::with(['mahasiswa'])->get();
            $statusnilai = StatusNilai::all();
            if (auth()->user()->level_id == 2) {
                $nilai = NilaiPendadaran::with(['Pendadaran.mahasiswa.jurusan', 'NilaiHuruf'])->latest()->get();
            } else {
                $nilai = NilaiPendadaran::with(['Pendadaran.mahasiswa.jurusan', 'NilaiHuruf'])->whereHas('Pendadaran', function ($q) use ($dosen_id) {
                    $q->where('penguji1_id', $dosen_id->id)
                        ->orWhere('penguji2_id', $dosen_id->id)
                        ->orWhere('penguji3_id', $dosen_id->id)
                        ->orWhere('penguji4_id', $dosen_id->id);
                })->latest()->get();
            }
            // $nilai = NilaiTA::With('TA.mahasiswa.jurusan', 'NilaiHuruf')->where('dosen_id', $dosen_id->id)->latest()->get();
            // dd($nilai);
            return view('pendadaran.nilaiPendadaran.index', compact('nilai', 'jurusan', 'Pendadaran', 'statusnilai', 'NilaiHuruf'));
        }
    }

    public function nim(Request $request)
    {
        if (Auth::user()->level_id == 2) {
            $pendadaranAll = Pendadaran::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
                $query->where('jurusan_id', $request->id);
            })->where('statuspendadaran_id', '5')->get();
        } else {
            $id = auth()->user()->id;
            $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
            $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
            $pendadaranAll = Pendadaran::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request, $dosen_id) {
                $query->where('jurusan_id', $request->id)->where('penguji1_id', $dosen_id->id)
                    ->orWhere('penguji2_id', $dosen_id->id)
                    ->orWhere('penguji3_id', $dosen_id->id)
                    ->orWhere('penguji4_id', $dosen_id->id);
            })->where('statuspendadaran_id', '5')->get();
        }
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
        $pendadaran = Pendadaran::with(['mahasiswa'])->where('id', $request->pendadaran_id)->get()->first();
        $data = array(
            'pendadaran_id' => $request->pendadaran_id,
            'nilaiAngka' => $request->nilaiAngka,
            'nilai_huruf_id' => $request->nilai_huruf_id,
            'statusnilai_id' => $request->statusnilai_id,
            'ket' => $request->ket,
        );
        // dd($data);
        $cek = NilaiPendadaran::create($data);
        if ($request->statusnilai_id == 2) {
            $status = array(
                'statuspendadaran_id' => 6,
            );
            // dd($status);
            $pendadaran->update($status);
        }
        if ($cek = true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Nilai Ujian Pendadaran');
        } else {
            Alert::warning('Gagal', 'Data Nilai Ujian Pendadaran Gagal Ditambahkan');
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
        // dd($value);
        $pendadaran = Pendadaran::with(['mahasiswa'])->where('id', $value->pendadaran_id)->get()->first();
        $value->update($data);
        if ($request->statusnilai_id == 2) {
            $status = array(
                'statuspendadaran_id' => 6,
            );
            // dd($status);
            $pendadaran->update($status);
        }
        Alert::success('Berhasil', 'Berhasil Ubah Status Nilai Ujian Pendadaran');
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
        Alert::success('Berhasil', 'Berhasil hapus data Nilai Ujian Pendadaran');
        return back();
    }
}

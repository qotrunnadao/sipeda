<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\User;
use App\Models\Dosen;
use App\Models\NilaiHuruf;
use App\Models\Jurusan;
use App\Models\NilaiTA;
use App\Models\Akademik;
use App\Models\Mahasiswa;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class NilaiTAController extends Controller
{

    public function index()
    {
        if (Auth::user()->level_id == 4) {
            $NilaiHuruf = NilaiHuruf::latest()->get();
            $id = Auth::User()->id;
            $user_id = User::where('id', $id)->get()->first();
            $mhs_id = Mahasiswa::with(['user'])->where('user_id', $user_id->id)->get()->first();
            $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
            $ta = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->where('status_id', '10')->latest()->get()->first();
            if ($ta) {
                $nilai = NilaiTA::with('TA', 'NilaiHuruf')->where('ta_id', $ta->id)->latest()->get();
            } else {
                $ta = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->get()->first();
                $nilai = NilaiTA::with('TA', 'NilaiHuruf')->where('ta_id', $ta->id)->where('statusnilai_id', '2')->latest()->get();
            }
            return view('mahasiswa.TA.pages.nilai', compact('TA', 'nilai', 'NilaiHuruf'));
        } else {
            $id = Auth::User()->id;
            $user_id = User::where('id', $id)->get()->first();
            $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
            // dd($dosen_id->id);
            $NilaiHuruf = NilaiHuruf::latest()->get();
            $jurusan = jurusan::all();
            $taAll = TA::with(['mahasiswa'])->get();
            $statusnilai = StatusNilai::all();
            if (auth()->user()->level_id == 2) {
                $nilai = NilaiTA::with(['TA.mahasiswa.jurusan', 'NilaiHuruf'])->latest()->get();
            } else {
                $nilai = NilaiTA::with(['TA.mahasiswa.jurusan', 'NilaiHuruf'])->whereHas('TA', function ($q) use ($dosen_id) {
                    $q->where('pembimbing1_id', $dosen_id->id)
                        ->orWhere('pembimbing2_id', $dosen_id->id);
                })->latest()->get();
            }
            // $nilai = NilaiTA::With('TA.mahasiswa.jurusan', 'NilaiHuruf')->where('dosen_id', $dosen_id->id)->latest()->get();
            // dd($nilai);
            return view('TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai', 'NilaiHuruf'));
        }
    }

    public function nim(Request $request)
    {
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
                $query->where('jurusan_id', $request->id);
            })->where('status_id', '9')
                ->get();
        }else{
            $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request, $dosen_id) {
                $query->where('jurusan_id', $request->id)
                    ->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->where('status_id', '9')
                ->get();
        }
        // dd($taAll);
        return response()->json($taAll, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $akademik = Akademik::where('mhs_id', $request->nim)->get()->first();
        $waktuselesai = Carbon::parse($akademik->created_at)->diff(Carbon::now())->format('%y Tahun, %m Bulan and %d Hari');
        // dd($waktuselesai);
        $taAll = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
        $data = [
            'ta_id' => $request->ta_id,
            'nilaiAngka' => $request->nilaiAngka,
            'nilai_huruf_id' => $request->nilai_huruf_id,
            'statusnilai_id' => $request->statusnilai_id,
            'ket' => $request->ket,
        ];
        // dd($data);
        if ($request->statusnilai_id == 2) {
            $status = array(
                'status_id' => 10,
            );
            // dd($status);
            $taAll->update($status);

            $selesai = array(
                'TASelesai' => $waktuselesai,
            );
            // dd($akademik);
            $akademik->update($selesai);
            $cek = NilaiTA::create($data);
        }

        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Nilai Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Nilai Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = NilaiTA::findOrFail($id);
        // dd($value->ta_id);
        $taAll = TA::with(['mahasiswa'])->where('id', $value->ta_id)->get()->first();
        $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
        $today = Carbon::now();
        $value->update($data);
         if ($request->statusnilai_id == 2) {
            $status = array(
                'status_id' => 10,
            );
            $taAll->update($status);

            $selesai = array(
                'TASelesai' => $today,
            );
            // dd($status);
            $akademik->update($selesai);
        }
        Alert::success('Berhasil', 'Berhasil Ubah Data Nilai Tugas Akhir');
        return back();
    }

    public function destroy($id)
    {
        $nilai = NilaiTA::find($id);
        $taAll = TA::with(['mahasiswa'])->where('id', $nilai->ta_id)->get()->first();
        $nilai->delete();
        $status = array(
            'status_id' => 9,
        );
        $taAll->update($status);
        Alert::success('Berhasil', 'Berhasil hapus data Nilai Tugas Akhir');
        return back();
    }
}

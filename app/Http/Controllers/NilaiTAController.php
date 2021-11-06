<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\NilaiTA;
use App\Models\Mahasiswa;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class NilaiTAController extends Controller
{

    public function index()
    {
        if (Auth::user()->level_id == 4) {
            $id = Auth::User()->id;
            $user_id = User::where('id', $id)->get()->first();
            $mhs_id = Mahasiswa::with(['user'])->where('user_id', $user_id->id)->get()->first();
            $ta = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->get();
            $nilai = NilaiTA::with('TA')->latest()->get();
            //dd($nilai);
            return view('mahasiswa.TA.pages.nilai', compact('nilai'));
        } else {
            $jurusan = jurusan::all();
            $taAll = TA::with(['mahasiswa'])->get();
            $statusnilai = StatusNilai::all();
            $nilai = NilaiTA::With('TA.mahasiswa.jurusan')->latest()->get();
            return view('TA.nilaiTA.index', compact('nilai', 'jurusan', 'taAll', 'statusnilai'));
        }
    }

    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '9')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $taAll = TA::with(['mahasiswa'])->where('id',$request->ta_id)->get()->first();
        // dd($data);
        $data = [
            'ta_id' => $request->ta_id,
            'nilaiAngka' => $request->nilaiAngka,
            'nilaiHuruf' => $request->nilaiHuruf,
            'statusnilai_id' => $request->statusnilai_id,
            'ket' => $request->ket,
        ];
        if($request->statusnilai_id == 2){
            $status = array(
                'status_id' => 10,
            );
            // dd($status);
            $taAll->update($status);
        }
        $cek = NilaiTA::create($data);
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
        dd($data);
        $taAll = TA::with(['mahasiswa'])->where('id',$request->ta_id)->get()->first();
        $value = NilaiTA::findOrFail($id);
        $value->update($data);
        if($request->statusnilai_id == 2){
            $status = array(
                'status_id' => 10,
            );
            // dd($status);
            $taAll->update($status);
        }
        Alert::success('Berhasil', 'Berhasil Ubah Status Nilai');
        return back();
    }

    public function destroy($id)
    {
        $nilai = NilaiTA::find($id);
        $nilai->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Jurusan');
        return back();
    }
}

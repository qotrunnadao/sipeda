<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TahunAkademik;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Yudisium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class YudisiumMahasiswaController extends Controller
{
    public function create()
    {
        $data_yudisium = new Yudisium();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $id = Auth::User()->id;
        // dd($id);
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $yudisium = Yudisium::with(['mahasiswa', 'periodeYudisium', 'statusYudisium'])->where('mhs_id', $mhs_id->id)->latest()->get();
        // dd($yudisium);
        return view('mahasiswa.yudisium.pages.pendaftaran', compact('data_yudisium', 'yudisium', 'tahun', 'mhs_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "berkas" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();
        $mhs_id = Mahasiswa::with(['user'])->where('id', $request->mahasiswa_id)->get()->first();
        $nim = $mhs_id->nim;
        $file = $request->file('berkas');
        $filename = 'Yudisium' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('berkas')->storeAS('public/assets/file/Yudisium/', $filename);
        $data = [
            'mhs_id' => $request->mahasiswa_id,
            'thnAkad_id' => $request->thnAkad_id,
            'status_id' => 2,
            'berkas' => $filename,
        ];
        // dd($data);
        $cek = Yudisium::create($data);

        if ($cek == true) {
            Alert::success('Berhasil', 'Pengajuan Yudisium telah Berhasil');
        } else {
            Alert::warning('Gagal', 'Pengajuan Yudisium Gagal Ditambahkan');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\akademik;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\BerkasPersyaratan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class YudisiumMahasiswaController extends Controller
{
    public function create()
    {
        $data_yudisium = new Yudisium();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $id = Auth::User()->id;
        $berkas = BerkasPersyaratan::where('nama_berkas', 'Yudisium')->latest()->get();
        // dd($berkasyds);
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $yudisium = Yudisium::with(['mahasiswa', 'periodeYudisium', 'statusYudisium'])->where('mhs_id', $mhs_id->id)->latest()->get();
        // dd($yudisium);
        return view('mahasiswa.yudisium.pages.pendaftaran', compact('data_yudisium', 'yudisium', 'tahun', 'mhs_id', 'berkas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "berkas" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();
        $mhs_id = Mahasiswa::with(['user'])->where('id', $request->mahasiswa_id)->get()->first();
        // dd($request->mahasiswa_id);
        $akademik = Akademik::where('mhs_id', $request->mahasiswa_id)->get()->first();
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
        $cek = Yudisium::create($data);
        $status = array(
            'statusYudisium' => $cek->id,
        );
        $isi = $akademik->update($status);
        if ($cek == true && $isi == true) {
            Alert::success('Berhasil', 'Pengajuan Yudisium telah Berhasil');
        } else {
            Alert::warning('Gagal', 'Pengajuan Yudisium Gagal Ditambahkan');
        }
        return back();
    }
}

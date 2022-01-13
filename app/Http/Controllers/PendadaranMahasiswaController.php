<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TahunAkademik;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendadaranMahasiswaController extends Controller
{
    public function create()
    {
        $data_pendadaran = new Pendadaran();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $id = Auth::User()->id;
        // dd($id);
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $pendadaran = Pendadaran::with(['mahasiswa', 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'statusPendadaran'])->where('mhs_id', $mhs_id->id)->latest()->get();
        // dd($pendadaran);
        return view('mahasiswa.pendadaran.pages.pengajuan', compact('data_pendadaran', 'pendadaran', 'tahun', 'mhs_id'));
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
        $filename = 'Pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
        // dd($filename);
        $path = $request->file('berkas')->storeAS('public/assets/file/Pendadaran/', $filename);
        $data = [
            'mhs_id' => $request->mahasiswa_id,
            'thnAkad_id' => $request->thnAkad_id,
            'statuspendadaran_id' => 2,
            'berkas' => $filename,
        ];
        // dd($data);
        $cek = Pendadaran::create($data);
        $status = array(
            'statusPendadaran' => $cek->id,
        );
        $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
        $isi = $akademik->update($status);
        if ($cek == true && $isi == true) {
            Alert::success('Berhasil', 'Pengajuan Ujian Pendadaran telah Berhasil');
        } else {
            Alert::warning('Gagal', 'Pengajuan Ujian Pendadaran Gagal Ditambahkan');
        }
        return back();
    }
}

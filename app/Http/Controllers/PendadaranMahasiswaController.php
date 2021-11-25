<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $dosen = Dosen::all();
        $id = Auth::User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $pendadaran = Pendadaran::with(['mahasiswa', 'penguji1', 'penguji2', 'penguji3', 'penguji4', 'statusPendadaran'])->where('mhs_id', $mhs_id->id)->latest()->get();
        $mahasiswa = Mahasiswa::with('user')->get()->all();
        return view('mahasiswa.pendadaran.pages.pengajuan', compact('data_pendadaran', 'pendadaran', 'dosen'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = User::where('id', $request->user)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $request->user_id)->get()->first();
        $nim = $mhs_id->nim;
        $file = $request->file('praproposal');
        $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $request->file('praproposal')->storeAS('public/assets/file/ProposalTA', $filename);
        $data = [
            'mahasiswa_id' => $mhs_id->id,
            'judulTA' => $request->judulTA,
            'instansi' => $request->instansi,
            'pembimbing1_id' => $request->pembimbing1,
            'pembimbing2_id' => $request->pembimbing2,
            'thnAkad_id' => $request->thnAkad_id,
            'status_id' => $request->status_id,
            'praproposal' => $filename,
        ];
        // dd($data);
        $cek = Pendadaran::create($data);

        if ($cek == true) {
            Alert::success('Berhasil', 'Pengajuan TA telah Berhasil');
        } else {
            Alert::warning('Gagal', 'Pengajuan TA Gagal Ditambahkan');
        }
        return back();
    }
}

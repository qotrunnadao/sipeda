<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Dosen;
use App\Models\Status;
use App\Models\Akademik;
use App\Models\StatusKP;
use App\Models\StatusTA;
use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\StatusYudisium;
use App\Models\SeminarProposal;
use App\Models\StatusPendadaran;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaTAController extends Controller
{
    public function beranda()
    {
        // $mahasiswa = Auth::user()->id;
        // $data = array(
        //     'akademik' => Akademik::with('mahasiswa')->where('mhs_id', $mahasiswa)->latest()->get(),
        //     'statusKP' => StatusKP::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'statusTA' => StatusTA::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'statusPendadaran' => StatusPendadaran::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'statusYudisium' => StatusYudisium::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'seminarProposal' => SeminarProposal::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'seminarHasil' => SeminarHasil::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        //     'spk' => SPK::with('mahasiswa')->where('mahasiswa_id', $mahasiswa)->latest()->get(),
        // );

        return view('mahasiswa.TA.pages.pengajuan');
    }

    public function proposal()
    {
        $data = array(
            'dosen' => Dosen::all(),
        );
        // $data_ta = new TA();
        // $tugas_akhir = TA::get();
        // $dosen = Dosen::all();
        // $tahunAkademik = TahunAkademik::With('semester')->get();
        // $mhs = Mahasiswa::all();
        // $status = Status::latest()->get();
        // $tugas_akhir = TA::latest()->get();
        // return view('mahasiswa.TA.pages.pengajuan', compact('data_ta', 'tugas_akhir', 'status', 'dosen', 'mhs', 'tahunAkademik'));
        return view('mahasiswa.TA.pages.pengajuan', $data);
    }

    public function pengajuan(Request $request)
    {
        if ($request->file('praproposal')) {
            $TA = TA::latest()->get();
            $mhs_id = Mahasiswa::where('id', $request->mahasiswa)->get()->first();
            // dd($mhs_id);
            $nim = $mhs_id->nim;
            $file = $request->file('praproposal');
            $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('praproposal')->storeAS('public/assets/file/TA', $filename);
            $data = [
                'mahasiswa_id' => $request->mahasiswa,
                'judulTA' => $request->judulTA,
                'instansi' => $request->instansi,
                'pembimbing1_id' => $request->pembimbing1_id,
                'pembimbing2_id' => $request->pembimbing2_id,
                'ket' => $request->ket,
                'status_id' => $request->status,
                'thnAkad_id' => $request->tahunAkademik,
                'praproposal' => $filename,
            ];
            $cek = TA::create($data);
        } else {
            $data['doc'] = NULL;
        }
        if ($cek == true) {
            Alert::success('Berhasil', 'Pengajuan TA telah Berhasil');
        } else {
            Alert::warning('Gagal', 'Pengajuan TA Gagal Ditambahkan');
        }

        return back();
    }
}

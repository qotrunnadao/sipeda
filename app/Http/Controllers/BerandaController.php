<?php

namespace App\Http\Controllers;

use File;
use App\Models\TA;
use Carbon\Carbon;
use App\Models\SPK;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Status;
use App\Models\Akademik;
use App\Models\StatusKP;
use App\Models\StatusTA;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\StatusNilai;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\StatusYudisium;
use App\Models\SeminarProposal;
use App\Models\StatusPendadaran;
use RealRashid\SweetAlert\Facades\Alert;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
        );
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user', 'TA1', 'TA2'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $akademik = Mahasiswa::with('TA.status', 'Pendadaran.statusPendadaran', 'Yudisium.statusYudisium')->latest()->get();
            // dd($akademik);
            $tugas_akhir = TA::with('mahasiswa')->where('status_id', '>=', '4')->latest()->get();
            $pendadaran = Pendadaran::with('mahasiswa')->where('statusPendadaran_id', '>=', '3')->latest()->get();
            $yudisium = Yudisium::with('mahasiswa')->where('status_id', '>=', '3')->latest()->get();
            return view('admin.beranda', compact('akademik', 'tugas_akhir', 'pendadaran', 'yudisium'));
        } elseif (auth()->user()->level_id == 1) {
            // $dosen = Dosen::with('TA1', 'TA2')->has('TA2')->where('jurusan_id', $dosen_id->jurusan_id)->orHas('TA1')->where('jurusan_id', $dosen_id->jurusan_id)->get();
            $dosen = Dosen::with('TA1', 'TA2')->where('jurusan_id', $dosen_id->jurusan_id)->get();
            $Mahasiswa = TA::with('mahasiswa')->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->where('status_id', '>=', '4')->latest()->get();
            // dd($Mahasiswa);
            return view('komisi.beranda', compact('dosen', 'dosen_id', 'Mahasiswa'));
        } elseif (auth()->user()->level_id == 3) {
            $dosen = Dosen::with('TA1', 'TA2')->where('jurusan_id', $dosen_id->jurusan_id)->get();
            $Mahasiswa = TA::with('mahasiswa')->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->where('status_id', '>=', '4')->latest()->get();
            return view('dosen.beranda', compact('dosen', 'dosen_id', 'Mahasiswa'));
        } elseif (auth()->user()->level_id == 5) {
            // $dosen = Dosen::with('TA1', 'TA2')->has('TA2')->where('jurusan_id', $dosen_id->jurusan_id)->orHas('TA1')->where('jurusan_id', $dosen_id->jurusan_id)->get();
            $dosen = Dosen::with('TA1', 'TA2')->where('jurusan_id', $dosen_id->jurusan_id)->get();
            $Mahasiswa = TA::with('mahasiswa')->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->where('status_id', '>=', '4')->latest()->get();
            // dd($Mahasiswa);
            return view('kajur.beranda', compact('dosen', 'dosen_id', 'Mahasiswa'));
        }
    }

    public function mahasiswaTA()
    {
        $id = auth()->User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        if ($TA == null) {
            $semprop = SeminarProposal::with('ta')->latest()->first();
            $spk = SPK::with('ta')->latest()->first();
            $semhas = SeminarHasil::with('ta')->latest()->first();
        } else {
            $semprop = SeminarProposal::with('ta')->where('ta_id', $TA->id)->latest()->first();
            $spk = SPK::with('ta')->where('ta_id', $TA->id)->latest()->first();
            // dd($tanggal);
            $semhas = SeminarHasil::with('ta')->where('ta_id', $TA->id)->latest()->first();
        }
        if ($spk !== null) {
            $sah = Carbon::parse($spk->created_at)->isoFormat('DD MMMM YYYY');
            $expired = Carbon::parse($spk->created_at)->addYear()->isoFormat('DD MMMM YYYY');
            // dd($sah);
        } else {
            $sah = null;
            $expired = null;
        }
        $ta = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
            // 'user' => Auth::user()::With('mahasiswa')->latest()->get(),
        );

        return view('mahasiswa.TA.pages.beranda', $ta, compact('TA', 'semhas', 'semprop', 'mhs_id', 'spk', 'expired', 'sah'));
    }

    public function downloadSPK($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/SPK TA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/SPK TA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function downloadSemprop($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function downloadSemhas($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }

    public function downloadPermohonanSeminar()
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/permohonanSeminar/Lembar Permohonan Seminar Proposal TA.pdf'))) {
            return response()->file(public_path('storage/assets/file/permohonanSeminar/Lembar Permohonan Seminar Proposal TA.pdf'));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }


    public function mahasiswaPendadaran()
    {
        $id = auth()->User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $pendadaran = Pendadaran::with(['mahasiswa'])->where('mhs_id', $mhs_id->id)->latest()->first();

        $data_pendadaran = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
        );

        return view('mahasiswa.Pendadaran.pages.beranda', $data_pendadaran, compact('pendadaran', 'mhs_id', 'data_pendadaran'));
    }

    public function mahasiswaYudisium()
    {
        $id = auth()->User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $yudisium = Yudisium::with(['mahasiswa'])->where('mhs_id', $mhs_id->id)->latest()->first();

        $data_yudisium = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
        );

        return view('mahasiswa.yudisium.pages.beranda', $data_yudisium, compact('yudisium', 'mhs_id'));
    }
}

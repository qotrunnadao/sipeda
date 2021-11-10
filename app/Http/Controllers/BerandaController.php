<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\User;
use App\Models\Status;
use App\Models\Akademik;
use Carbon\Carbon;
use App\Models\StatusKP;
use App\Models\StatusTA;
use App\Models\Mahasiswa;
use App\Models\StatusNilai;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\Pendadaran;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\StatusYudisium;
use App\Models\StatusPendadaran;
use App\Models\Yudisium;

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
            'statusTA' => StatusTA::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
        );
        if (auth()->user()->level_id == 2) {
            return view('admin.master.beranda', $data);
        } elseif (auth()->user()->level_id == 1) {
            return view('komisi.beranda', $data);
        } elseif (auth()->user()->level_id == 3) {
            return view('dosen.beranda', $data);
        } elseif (auth()->user()->level_id == 5) {
            return view('kajur.beranda');
        }
    }

    public function mahasiswaTA()
    {
        $id = auth()->User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        // $pendadaran = Pendadaran::where('mhs_id', $mhs_id->id)->latest()->get();
        // $yudisium = Yudisium::where('mhs_id', $mhs_id->id)->latest()->get();
        $semprop = SeminarProposal::with('ta')->where('ta_id', $TA->id)->latest()->first();
        $spk = SPK::with('ta')->where('ta_id', $TA->id)->latest()->first();
        $semhas = SeminarHasil::with('ta')->where('ta_id', $TA->id)->latest()->first();
        // $spkterbit = $spk->where('created_at', date());
        // $spkberakhir = Carbon::now()->addYear(1)->isoFormat('Y M D');

        // dd($semprop);

        $ta = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
            // 'user' => Auth::user()::With('mahasiswa')->latest()->get(),
        );

        return view('mahasiswa.TA.pages.beranda', $ta, compact('TA', 'semhas', 'semprop', 'mhs_id', 'spk'));
    }

    public function downloadSPK($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage\assets\file\SPK TA/' . $filename . ''));
    }
    public function downloadSemprop($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''));
    }
    public function downloadSemhas($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/Berita Acara Semhas TA/' . $filename . ''));
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

        return view('mahasiswa.Pendadaran.pages.beranda', $data_pendadaran, compact('pendadaran', 'mhs_id'));
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

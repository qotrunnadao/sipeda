<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Status;
use Barryvdh\DomPDF\PDF;
use App\Models\Mahasiswa;
use App\Models\Distribusi;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $status = Status::latest()->get();
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $distribusi = Distribusi::with('ta')->latest()->get();
        } elseif (auth()->user()->level_id == 3) {
            $distribusi = Distribusi::with(['ta'])->whereHas('ta', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            // dd($distribusi);
        } elseif (auth()->user()->level_id == 1 || 5) {
            $distribusi = Distribusi::with(['ta'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('ta', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
        }
        return view('TA.distribusi.index', compact('distribusi', 'status', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_distribusi = new Distribusi();
        $id = Auth::User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        $tugas_akhir = TA::with(['dosen1', 'dosen2'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        //    dd($tugas_akhir);
        $distribusi = Distribusi::with(['mahasiswa'])->where('ta_id', $tugas_akhir->id)->select('*')->latest()->get();
        return view('mahasiswa.TA.pages.distribusi', compact('TA', 'data_distribusi', 'distribusi', 'tugas_akhir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "fileDistribusi" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();
        $tugas_akhir = TA::where('id', $request->ta_id)->latest()->first();
        // dd($tugas_akhir->status_id);
        if ($tugas_akhir->status_id < '5') {
            Alert::warning('Gagal', ' Anda Belom Mempunyai Data Pengajuan TA yang Sudah Disetujui');
            return back();
        } elseif ($tugas_akhir->status_id >= '5') {
            $mhs_id = Mahasiswa::with(['user'])->where('user_id', $request->user_id)->get()->first();
            $nim = $mhs_id->nim;
            // dd($nim);
            $file = $request->file('fileDistribusi');
            $filename = 'Distribusi TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileDistribusi')->storeAS('public/assets/file/fileDistribusiTA/', $filename);
            $data = [
                'ta_id' => $request->ta_id,
                'fileDistribusi' => $filename,
            ];
            // dd($data);
            $cek = Distribusi::create($data);
        } else {
            $data['fileDistribusi'] = NULL;
        }
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Menambahkan Data Distribusi Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Distribusi Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribusi  $distribusi
     * @return \Illuminate\Http\Response
     */

    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/fileDistribusiTA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/fileDistribusiTA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }

    public function downloadform()
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/form distribusi/'))) {
            return response()->file(public_path('storage/assets/file/form distribusi/FORM DISTRIBUSI.pdf'));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }

    public function nim(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($id) {
            $query->where('jurusan_id', $id);
        })->where('status_id', '10')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
    }
    public function show(Request $request)
    {
        $data = $request->all();
        // dd($request->file('Distribusi'));
        $mhs_id = TA::with(['mahasiswa'])->where('mahasiswa_id', $request->nim)->get()->first();
        $nim = $mhs_id->mahasiswa->nim;
        $file = $request->file('Distribusi');
        $filename = 'Distribusi TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
        // dd($filename);
        $path = $request->file('Distribusi')->storeAS('public/assets/file/fileDistribusiTA/', $filename);
        $data = [
            'ta_id' => $request->ta_id,
            'fileDistribusi' => $filename,
        ];
        // dd($data);
        $cek = Distribusi::create($data);

        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Menambahkan Data Distribusi Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Distribusi Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribusi  $distribusi
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribusi $distribusi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribusi  $distribusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribusi $distribusi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribusi  $distribusi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distribusi = Distribusi::find($id);
        File::delete(public_path('storage/assets/file/fileDistribusiTA/' . $distribusi->fileDistribusi . ''));
        // dd($distribusi->fileDistribusi);
        $distribusi->delete();
        Alert::success('Berhasil', 'Berhasil hapus data distribusi');
        return back();
    }
}

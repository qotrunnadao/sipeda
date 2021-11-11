<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Status;
use Barryvdh\DomPDF\PDF;
use App\Models\Mahasiswa;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::latest()->get();
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $distribusi = Distribusi::with('ta')->latest()->get();
        } elseif (auth()->user()->level_id == 3) {
            $distribusi = Distribusi::with(['ta'])->whereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
        } elseif (auth()->user()->level_id == 1 || 5) {
            $distribusi = Distribusi::with(['ta'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
        }
        return view('TA.distribusi.index', compact('distribusi', 'status'));
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
        $tugas_akhir = TA::with(['dosen1', 'dosen2'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        $distribusi = Distribusi::with(['mahasiswa'])->where('ta_id', $tugas_akhir->id)->select('*')->latest()->get();
        return view('mahasiswa.TA.pages.distribusi', compact('data_distribusi', 'distribusi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return response()->download(public_path('storage/assets/file/Distribusi TA/' . $filename . ''));
    }

    public function eksport(Request $request, $id)
    {
        $ta_id = $request->route('id');

        $distribusi = Distribusi::with(['TA.mahasiswa'])->where('ta_id', $request->route('id'))->get()->first();
        $taAll = TA::with(['mahasiswa'])->where('id', $request->route('id'))->get()->first();


        $data = ['ta_id' => $ta_id, 'distribusi' => $distribusi];
        $pdf = PDF::loadView('TA.distribusi.download', $data);

        $filename = 'Distribusi TA' . '_' . $distribusi->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Distribusi TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'fileDsitribusi' => $filename,
            ];
            // dd($data );
            $distribusi->update($data);
            $status = array(
                'status_id' => 12,
            );
            // dd($status);
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil upload file distribusi');
        } else {
            Alert::warning('Gagal', 'File distribusi Gagal Ditambahkan');
        }
        return back();
    }

    public function show(Distribusi $distribusi)
    {
        //
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
        $distribusi->delete();
        Alert::success('Berhasil', 'Berhasil hapus data distribusi');
        return back();
    }
}

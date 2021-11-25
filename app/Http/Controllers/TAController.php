<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Status;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\NilaiTA;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class TAController extends Controller
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
            $tugas_akhir = TA::with('status')->latest()->get();
            $acc_ta = TA::with('status')->where('status_id', 2)->latest()->get();
        } elseif (auth()->user()->level_id == 3) {
            $tugas_akhir = TA::with(['status'])->whereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            $acc_ta = TA::with('status')->where('status_id', 2)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
        } elseif (auth()->user()->level_id == 1 || 5) {
            $tugas_akhir = TA::with(['status'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            $acc_ta = TA::with('status')->where('status_id', 3)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
        }
        $jurusan = jurusan::get();
        return view('TA.dataTA.index', compact('acc_ta', 'tugas_akhir', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('TA.store');
        $button = 'Tambah';
        $data_ta = new TA();
        $tugas_akhir = TA::get();
        $jurusan = jurusan::all();
        $mhs = Mahasiswa::all();
        $dosen = Dosen::all();
        $tahunAkademik = TahunAkademik::With('semester')->get();
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        return view('TA.dataTA.form', compact('action', 'button', 'data_ta', 'tugas_akhir', 'status', 'dosen', 'jurusan', 'tahunAkademik', 'mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nim(Request $request)
    {
        $mahasiswa = Mahasiswa::where('jurusan_id', $request->id)->get();
        // dd($mahasiswa);
        return response()->json($mahasiswa, 200);
    }

     public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        if ($request->file('praproposal')) {
            $TA = TA::latest()->get();
            $mhs_id = Mahasiswa::where('id', $request->nim)->get()->first();
            // dd($mhs_id);
            $nim = $mhs_id->nim;
            $file = $request->file('praproposal');
            $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('praproposal')->storeAS('public/assets/file/PraproposalTA/', $filename);
            $data = [
                'mahasiswa_id' => $request->nim,
                'judulTA' => $request->judulTA,
                'instansi' => $request->instansi,
                'pembimbing1_id' => $request->pembimbing1_id,
                'pembimbing2_id' => $request->pembimbing2_id,
                'ket' => $request->ket,
                'status_id' => $request->status_id,
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

        return redirect(route('TA.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_list = TA::find($id);
        $mhs = Mahasiswa::all();
        $data = [
            'data_TA' => $data_list
        ];
        // passing data Izin yang didapat
        return view('TA.dataTA.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_ta = TA::find($id);
        $action = route('TA.update', $data_ta->id);
        $button = 'Edit';
        $dosen = Dosen::get();
        $tahunAkademik = TahunAkademik::With('semester')->get();
        $mhs = Mahasiswa::get();
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        foreach ($tugas_akhir as $value) {
            $dosen1_id = $value->pembimbing1_id;
            $dosen2_id = $value->pembimbing2_id;
            $status_id = $value->status_id;
            $dosen1 = Dosen::where('id', $dosen1_id)->first();
            $nama_dosen1 = $dosen1->nama;
            $dosen2 = Dosen::where('id', $dosen2_id)->first();
            $nama_dosen2 = $dosen2->nama;
            $stts = Status::where('id', $status_id)->first();
            $ketStatus = $stts->ket;
        }
        return view('TA.dataTA.form', compact('action', 'button', 'data_ta', 'tugas_akhir', 'nama_dosen1', 'nama_dosen2', 'ketStatus', 'status', 'dosen', 'mhs', 'tahunAkademik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tugas_akhir = TA::find($id);
        $data = $request->all();
        if ($request->file('praproposal')) {
            $TA = TA::latest()->get();
            $mhs_id = Mahasiswa::where('id', $request->mahasiswa)->get()->first();
            // dd($mhs_id);
            $nim = $mhs_id->nim;
            $file = $request->file('praproposal');
            $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('praproposal')->storeAS('public/assets/file/PraproposalTA/', $filename);
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
        } else {
            $data['praproposal'] = $tugas_akhir->praproposal;
        }

        $tugas_akhir->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Data TA');
        return redirect(route('TA.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas_akhir = TA::find($id);
        $tugas_akhir->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Tugas Akhir');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/PraproposalTA/' . $filename . ''));
    }
}

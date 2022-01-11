<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Dosen;
use App\Models\Akademik;
use App\Models\User;
use App\Models\Status;
use App\Models\jurusan;
use App\Models\Mahasiswa;
use App\Models\NilaiTA;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use File;
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
            $tugas_akhir = TA::with('status')->where('status_id', '!=', 2)->latest()->get();
            $acc_ta = TA::with('status')->where('status_id', 2)->latest()->get();
        } elseif (auth()->user()->level_id == 3) {
            $tugas_akhir = TA::with(['status'])->whereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            $acc_ta = TA::with('status')->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->where('status_id', '>=', 5)->latest()->get();
        } elseif (auth()->user()->level_id == 1 || 5) {
            $tugas_akhir = TA::with(['status'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                    ->orWhere('pembimbing2_id', $dosen_id->id);
            })->where('status_id', '!=', 3)->latest()->get();
            $acc_ta = TA::with('status')->where('status_id', 3)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
        }
        // dd($tugas_akhir->first()->status_id);
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
        $tahunAkademik = TahunAkademik::where('aktif', '1')->first()->get();
        // dd($tahunAkademik->namaTahun);
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
        $mahasiswa = Mahasiswa::whereDoesntHave('TA')->where('jurusan_id',  $request->id)->orwhereHas('TA', function ($q) use ($request) {
            $q->where('status_id', '1');
        })->get();
        // $mahasiswa = Mahasiswa::whereDoesntHave('TA')->where('jurusan_id', $request->id)->get();
        // dd($mahasiswa);
        return response()->json($mahasiswa, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "praproposal" => "mimes:pdf|max:10000"
        ]);
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
            $status = array(
                'statusTA' => $cek->id,
            );
            $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
            if ($akademik) {
                $akademik->update($status);
            } else {
                Alert::warning('Gagal', 'Pengajuan TA Gagal Ditambahkan');
                return back();
            }
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
        $tahunAkademik = TahunAkademik::where('aktif', '1')->get()->first();
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
        $this->validate($request, [
            "praproposal" => "mimes:pdf|max:10000"
        ]);
        $tugas_akhir = TA::find($id);
        $data = $request->all();
        $hapus = $tugas_akhir->praproposal;
        if ($request->file('praproposal')) {
            $mhs_id = Mahasiswa::where('id', $tugas_akhir->mahasiswa_id)->get()->first();
            $nim = $mhs_id->nim;
            //    dd($request->tahunAkademik);
            $file = $request->file('praproposal');
            $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('praproposal')->storeAS('public/assets/file/PraproposalTA/', $filename);
            $data = [
                'judulTA' => $request->judulTA,
                'instansi' => $request->instansi,
                'pembimbing1_id' => $request->pembimbing1_id,
                'pembimbing2_id' => $request->pembimbing2_id,
                'ket' => $request->ket,
                'status_id' => $request->status_id,
                'praproposal' => $filename,
            ];
            File::delete(public_path('storage/assets/file/PraproposalTA/' . $hapus . ''));
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
        if ($tugas_akhir != null) {
            File::delete(public_path('storage/assets/file/PraproposalTA/' . $tugas_akhir->praproposal . ''));
            // dd($tugas_akhir->praproposal);
            $tugas_akhir->delete();
            Alert::success('Berhasil', 'Berhasil hapus data Tugas Akhir');
            return back();
        }
        Alert::warning('Gagal', 'Data Tugas Akhir Gagal Dihapus');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/PraproposalTA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/PraproposalTA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
}

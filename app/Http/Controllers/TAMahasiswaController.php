<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Akademik;
use App\Models\Dosen;
use App\Models\BerkasPersyaratan;
use App\Models\User;
use App\Models\TahunAkademik;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use RealRashid\SweetAlert\Facades\Alert;

class TAMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::latest()->get();
        $tugas_akhir = TA::latest()->get();
        $jurusan = Jurusan::get();
        $dosen = Dosen::all();
        return view('mahasiswa.TA.pages.beranda', compact('tugas_akhir', 'status', 'jurusan', 'dosen'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = auth()->User()->id;
        $berkas = BerkasPersyaratan::where('nama_berkas', 'Tugas Akhir')->latest()->get();
        // dd($berkas);
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $TA = TA::with(['mahasiswa'])->where('mahasiswa_id', $mhs_id->id)->latest()->first();
        $data_ta = new TA();
        $dosen = Dosen::all();
        $id = Auth::User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $tugas_akhir = TA::with(['mahasiswa', 'dosen1', 'dosen2', 'status'])->where('mahasiswa_id', $mhs_id->id)->get();
        // dd($tugas_akhir);
        $mahasiswa = Mahasiswa::with('user')->get()->all();
        return view('mahasiswa.TA.pages.pengajuan', compact('data_ta', 'tugas_akhir', 'dosen', 'tahun', 'TA', 'berkas'));
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
            "praproposal" => "required|mimes:pdf|max:10000"
        ]);
        $data = $request->all();

        if ($request->file('praproposal')) {
            $user_id = User::where('id', $request->user)->get()->first();
            $mhs_id = Mahasiswa::with(['user'])->where('user_id', $request->user_id)->get()->first();
            $nim = $mhs_id->nim;
            // dd($mhs_id);
            $file = $request->file('praproposal');
            $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('praproposal')->storeAS('public/assets/file/PraproposalTA/', $filename);
            $data = [
                'mahasiswa_id' => $mhs_id->id,
                'judulTA' => $request->judulTA,
                'instansi' => $request->instansi,
                'pembimbing1_id' => $request->pembimbing1,
                'pembimbing2_id' => $request->pembimbing2,
                'namaDosen' => $request->namaDosen,
                'nip' => $request->nip,
                'thnAkad_id' => $request->thnAkad_id,
                'status_id' => $request->status_id,
                'praproposal' => $filename,
            ];
            // dd($cek->id);
            $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
            if ($akademik) {
                $cek = TA::create($data);
                $status = array(
                    'statusTA' => $cek->id,
                );
                $isi = $akademik->update($status);
                if ($cek == true && $isi == true) {
                    Alert::success('Berhasil', 'Pengajuan TA telah Berhasil');
                } else {
                    Alert::warning('Gagal', 'Pengajuan TA Gagal Ditambahkan');
                }
                return back();
            } else {
                Alert::warning('Gagal', 'Pengajuan TA Gagal Ditambahkan');
                return back();
            }
            // dd($status);
        } else {
            $data['doc'] = NULL;
        }
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
        $this->validate($request, [
            "praproposal" => "required|mimes:pdf|max:10000"
        ]);
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
            // dd($data);
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
        Alert::success('Berhasil', 'Berhasil hapus data Pendadaran');
        return back();
    }
}

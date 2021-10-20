<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Status;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use App\Models\StatusPendadaran;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use RealRashid\SweetAlert\Facades\Alert;

class PendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusPendadaran::latest()->get();
        $pendadaran = Pendadaran::latest()->get();
        $jurusan = jurusan::get();
        foreach ($pendadaran as $value) {
            $penguji1_id = $value->penguji1_id;
            $penguji2_id = $value->penguji2_id;
            $penguji3_id = $value->penguji3_id;
            $penguji4_id = $value->penguji4_id;

            $penguji1 = Dosen::where('id', $penguji1_id)->first();
            $namaPenguji1 = $penguji1->nama;
            $penguji2 = Dosen::where('id', $penguji2_id)->first();
            $namaPenguji2 = $penguji2->nama;
            $penguji3 = Dosen::where('id', $penguji3_id)->first();
            $namaPenguji3 = $penguji3->nama;
            $penguji4 = Dosen::where('id', $penguji4_id)->first();
            $namaPenguji4 = $penguji4->nama;
        }
        //return view('dataPendadaran.index', compact('pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'status', 'jurusan'));

        if (auth()->user()->level_id == 2) {
            return view('admin.pendadaran.dataPendadaran.index', compact('pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'status', 'jurusan'));
        } elseif (auth()->user()->level_id == 1) {
            return view('komisi.pendadaran.dataPendadaran.index', compact('pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'status', 'jurusan'));
        } elseif (auth()->user()->level_id == 3) {
            return view('dosen.pendadaran.dataPendadaran.index', compact('pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'status', 'jurusan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('pendadaran.store');
        $button = 'Tambah';
        $data_pendadaran = new Pendadaran();
        $pendadaran = Pendadaran::get();
        $dosen = Dosen::get();
        $status = StatusPendadaran::latest()->get();
        $jurusan = jurusan::get();
        foreach ($pendadaran as $value) {
            $penguji1_id = $value->penguji1_id;
            $penguji2_id = $value->penguji2_id;
            $penguji3_id = $value->penguji3_id;
            $penguji4_id = $value->penguji4_id;
            $status_id = $value->statuspendadaran_id;
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jrsn_id = $mahasiswa->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;

            $penguji1 = Dosen::where('id', $penguji1_id)->first();
            $namaPenguji1 = $penguji1->nama;
            $penguji2 = Dosen::where('id', $penguji2_id)->first();
            $namaPenguji2 = $penguji2->nama;
            $penguji3 = Dosen::where('id', $penguji3_id)->first();
            $namaPenguji3 = $penguji3->nama;
            $penguji4 = Dosen::where('id', $penguji4_id)->first();
            $namaPenguji4 = $penguji4->nama;
            $stts = StatusPendadaran::where('id', $status_id)->first();
            $ketStatus = $stts->status;
        }
        //return view('dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));

        if (auth()->user()->level_id == 2) {
            return view('admin.pendadaran.dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));
        } elseif (auth()->user()->level_id == 1) {
            return view('komisi.pendadaran.dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));
        } elseif (auth()->user()->level_id == 3) {
            return view('dosen.pendadaran.dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pendadaran::create($request->all());
        $data = $request->all();

        if (Pendadaran::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Izin');
        } else {
            Alert::warning('Gagal', 'Data Izin Gagal Ditambahkan');
        }
        return redirect(route('pendadaran.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendadaran $pendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = url('/pendadaran/data-pendadaran/update');
        $button = 'Edit';
        $pendadaran = Pendadaran::get();
        $data_pendadaran = Pendadaran::find($id);
        $dosen = Dosen::get();
        $status = StatusPendadaran::latest()->get();
        $jurusan = jurusan::get();
        foreach ($pendadaran as $value) {
            $penguji1_id = $value->penguji1_id;
            $penguji2_id = $value->penguji2_id;
            $penguji3_id = $value->penguji3_id;
            $penguji4_id = $value->penguji4_id;
            $status_id = $value->statuspendadaran_id;
            $mhs_id = $value->mhs_id;
            $mahasiswa = Mahasiswa::where('id', $mhs_id)->first();
            $namaMahasiswa = $mahasiswa->nama;
            $nim = $mahasiswa->nim;
            $jrsn_id = $mahasiswa->jurusan_id;
            $jurusan_id = Jurusan::where('id', $jrsn_id)->first();
            $namaJurusan = $jurusan_id->namaJurusan;

            $penguji1 = Dosen::where('id', $penguji1_id)->first();
            $namaPenguji1 = $penguji1->nama;
            $penguji2 = Dosen::where('id', $penguji2_id)->first();
            $namaPenguji2 = $penguji2->nama;
            $penguji3 = Dosen::where('id', $penguji3_id)->first();
            $namaPenguji3 = $penguji3->nama;
            $penguji4 = Dosen::where('id', $penguji4_id)->first();
            $namaPenguji4 = $penguji4->nama;
            $stts = StatusPendadaran::where('id', $status_id)->first();
            $ketStatus = $stts->status;
        }
        return view('dataPendadaran.form', compact('action', 'button', 'data_pendadaran', 'pendadaran', 'namaPenguji1', 'namaPenguji2', 'namaPenguji3', 'namaPenguji4', 'ketStatus', 'status', 'jurusan', 'dosen', 'namaMahasiswa', 'nim', 'namaJurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pendadaran = Pendadaran::find($id);
        $data = $request->all();
        $pendadaran->update($data);
        Alert::success('Berhasil', 'Berhasil edit data Izin');
        return redirect('/pendadaran/data-pendadaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendadaran  $pendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendadaran = Pendadaran::find($id);
        $pendadaran->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Pendadaran');
        return back();
    }


    public function diterima(Pendadaran $pendadaran)
    {
        $data = array(
            'status' => 1,
        );
        $pendadaran->update($data);
        Alert::success('Berhasil', 'Pengajuan Izin Diterima');
        return back();
    }
    public function ditolak(Pendadaran $pendadaran)
    {
        $data = array(
            'status' => 2,
        );
        $pendadaran->update($data);
        Alert::warning('Berhasil', 'Pengajuan Izin Ditolak');
        return back();
    }
}

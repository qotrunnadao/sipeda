<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use App\Models\PeriodeYudisium;
use App\Models\Dosen;
use App\Models\User;
use App\Models\SK;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\StatusYudisium;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class YudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = StatusYudisium::get()->all();$id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        $periode = PeriodeYudisium::where('aktif', '1')->get()->all();
        $yudisium = Yudisium::with(['periodeyudisium'])->latest()->get();
        // dd($yudisium);
        if (auth()->user()->level_id == 2) {
            $yudisium = Yudisium::with(['mahasiswa', 'periodeYudisium', 'statusYudisium'])->latest()->get();
            $acc_yudisium = Yudisium::with(['mahasiswa', 'periodeYudisium', 'statusYudisium'])->where('status_id', 2)->latest()->get();
        } elseif (auth()->user()->level_id == 5) {
            $yudisium = Yudisium::with(['statusYudisium'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
            $acc_yudisium = Yudisium::with('statusYudisium')->where('status_id', 4)->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->latest()->get();
        }
        return view('yudisium.dataYudisium.index', compact('yudisium', 'status', 'periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('yudisium.store');
        $button = 'Tambah';
        $data_yudisium = new Yudisium();
        $yudisium = Yudisium::get();
        $status = StatusYudisium::get();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        // dd($tahun);
        $jurusan = jurusan::get();
        return view('yudisium.dataYudisium.form', compact('action', 'button', 'data_yudisium', 'status', 'tahun', 'jurusan'));
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
            "berkas" => "mimes:pdf|max:10000"
        ]);
        Yudisium::create($request->all());
        $data = $request->all();

        if (Yudisium::create($data)) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Pengajuan Yudisium');
        } else {
            Alert::warning('Gagal', 'Data Pengajuan Yudisium Gagal Ditambahkan');
        }

        return redirect(route('yudisium.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function show(Yudisium $yudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yudisium = Yudisium::get();
        $data_yudisium = Yudisium::find($id);
        $button = 'Edit';
        $action = url('/yudisium/data-yudisium/update');
        $status = StatusYudisium::get();
        return view('yudisium.dataYudisium.form', compact('action', 'button', 'data_yudisium', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $yudisium = Yudisium::find($id);
        $data = $request->all();
        // dd($data);
        $yudisium->update($data);
        Alert::success('Berhasil', 'Berhasil edit data Yudisium');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Yudisium  $yudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $yudisium = Yudisium::find($id);
        $yudisium->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Yudisium');
        return back();
    }

    public function diterima(Yudisium $yudisium)
    {
        $data = array(
            'status_id' => 3,
        );
        $yudisium->update($data);
        Alert::success('Berhasil', 'Pengajuan Yudisium Diterima');
        return back();
    }
    public function ditolak(Yudisium $yudisium)
    {
        $data = array(
            'status_id' => 1,
        );
        $yudisium->update($data);
        Alert::warning('Berhasil', 'Pengajuan Yudisium Ditolak');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Yudisium/' . $filename . ''))) {
            return response()->File(public_path('storage/assets/file/Yudisium/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
}

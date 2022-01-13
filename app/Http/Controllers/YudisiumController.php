<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\akademik;
use App\Models\Mahasiswa;
use App\Models\PeriodeYudisium;
use App\Models\Dosen;
use App\Models\User;
use App\Models\SK;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;
use App\Models\StatusYudisium;
use File;
use PDF;
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
        $status = StatusYudisium::get()->all();
        $id = auth()->user()->id;
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
        return view('yudisium.dataYudisium.index', compact('yudisium', 'status', 'periode', 'acc_yudisium'));
    }

    public function laporan()
    {
        $periode = PeriodeYudisium::where('aktif', '1')->get()->all();
        // dd($yudisium);
        return view('yudisium.dataYudisium.cetaksk', compact('periode'));
    }
    public function cetaksk()
    {
        $periode = PeriodeYudisium::where('aktif', '1')->get()->all();
        $pdf = PDF::loadView('yudisium.periode.berkas', ['periode' => $periode])->setPaper('a4', 'landscape');

        // dd($yudisium);
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
        $periode = PeriodeYudisium::where('aktif', '1')->get()->all();
        $status = StatusYudisium::get();
        $tahun = TahunAkademik::where('aktif', '1')->get()->first();
        // dd($tahun);
        $jurusan = jurusan::get();
        return view('yudisium.dataYudisium.form', compact('action', 'button', 'data_yudisium', 'status', 'tahun', 'jurusan', 'periode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nim(Request $request)
    {
        $mahasiswa = Mahasiswa::Has('TA')->whereHas('TA', function ($q) use ($request) {
            $q->where('status_id', '10');
        })->Has('Pendadaran')->whereHas('Pendadaran', function ($q) {
            $q->where('statuspendadaran_id', '6');
        })->whereDoesntHave('Yudisium')->orHas('Yudisium')->whereHas('Yudisium', function ($q) {
            $q->where('status_id', '1');
        })->where('jurusan_id', $request->id)->get();
        // dd($mahasiswa);
        return response()->json($mahasiswa, 200);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "berkas" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();
        $mhs_id = Mahasiswa::where('id', $request->nim)->get()->first();
        $nim = $mhs_id->nim;
        if ($request->file('berkas') && $request->file('transkipNilai')) {
            $transkip = $request->file('transkipNilai');
            $file = $request->file('berkas');
            $transkipname = 'Transkip Nilai' . '_' . $nim . '_' . time() . '.' . $transkip->getClientOriginalExtension();
            $filename = 'Yudisium' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('berkas')->storeAS('public/assets/file/Yudisium/', $filename);
            $path1 = $request->file('transkipNilai')->storeAS('public/assets/file/Transkip Nilai/', $transkipNilai);
            // dd($filename);
            $data = [
                'mhs_id' => $request->nim,
                'thnAkad_id' => $request->thnAkad_id,
                'status_id' => $request->statusyudisium_id,
                'transkipNilai' => $transkipname,
                'berkas' => $filename,
                'periode_id' => $request->periode_id,
                'ket' => $request->ket,
            ];
            // dd($data);
            $cek = Yudisium::create($data);
            $status = array(
                'statusYudisium' => $cek->id,
            );
            $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
            if ($cek == true) {
                Alert::success('Berhasil', 'Berhasil Tambah Data Pengajuan Yudisium');
            } else {
                Alert::warning('Gagal', 'Data Pengajuan Yudisium Gagal Ditambahkan');
            }
        }elseif ($request->file('berkas')) {
            $file = $request->file('berkas');
            $filename = 'Yudisium' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('berkas')->storeAS('public/assets/file/Yudisium/', $filename);
            // dd($filename);
            $data = [
                'mhs_id' => $request->nim,
                'thnAkad_id' => $request->thnAkad_id,
                'status_id' => $request->statusyudisium_id,
                'berkas' => $filename,
                'periode_id' => $request->periode_id,
                'ket' => $request->ket,
            ];
            // dd($data);
            $cek = Yudisium::create($data);
            $status = array(
                'statusYudisium' => $cek->id,
            );
            $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
            if ($cek == true) {
                Alert::success('Berhasil', 'Berhasil Tambah Data Pengajuan Yudisium');
            } else {
                Alert::warning('Gagal', 'Data Pengajuan Yudisium Gagal Ditambahkan');
            }
        } elseif ($request->file('transkipNilai')) {
            $transkip = $request->file('transkipNilai');
            $transkipname = 'Transkip Nilai' . '_' . $nim . '_' . time() . '.' . $transkip->getClientOriginalExtension();
            $path = $request->file('transkipNilai')->storeAS('public/assets/file/Transkip Nilai/', $transkipNilai);
            // dd($transkipNilai);
            $data = [
                'mhs_id' => $request->nim,
                'thnAkad_id' => $request->thnAkad_id,
                'status_id' => $request->statusyudisium_id,
                'transkipNilai' => $transkipname,
                'periode_id' => $request->periode_id,
                'ket' => $request->ket,
            ];
            // dd($data);
            $cek = Yudisium::create($data);
            $status = array(
                'statusYudisium' => $cek->id,
            );
            $akademik = Akademik::where('mhs_id', $mhs_id->id)->get()->first();
            if ($cek == true) {
                Alert::success('Berhasil', 'Berhasil Tambah Data Pengajuan Yudisium');
            } else {
                Alert::warning('Gagal', 'Data Pengajuan Yudisium Gagal Ditambahkan');
            }
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
        File::delete(public_path('storage/assets/file/Yudisium/' . $yudisium->berkas . ''));
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

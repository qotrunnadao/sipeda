<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BeritaAcaraPendadaran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class BeritaAcaraPendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        $pendadaranAll = Pendadaran::with(['mahasiswa'])->get();
        $beritaacara = BeritaAcaraPendadaran::with('pendadaran.mahasiswa.jurusan')->latest()->get();

        return view('pendadaran.beritaAcaraPendadaran.index', compact('beritaacara', 'jurusan', 'pendadaranAll'));

        // if (auth()->user()->level_id == 2) {
        //     return view('admin.pendadaran.beritaAcaraPendadaran.index', compact('beritaacara', 'jurusan', 'pendadaranAll'));
        // } elseif (auth()->user()->level_id == 1) {
        //     return view('komisi.pendadaran.beritaAcaraPendadaran.index', compact('beritaacara', 'jurusan', 'pendadaranAll'));
        // } elseif (auth()->user()->level_id == 3) {
        //     return view('dosen.pendadaran.beritaAcaraPendadaran.index', compact('beritaacara', 'jurusan', 'pendadaranAll'));
        // }
    }

    public function nim(Request $request)
    {
        $pendadaranAll = Pendadaran::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('statuspendadaran_id', '1')->get();
        // dd($taAll);
        return response()->json($pendadaranAll, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->file('beritaacara')) {
            $beritaacara = BeritaAcaraPendadaran::latest()->get();
            foreach ($beritaacara as $value) {
                $pendadaran_id = $value->pendadaran_id;
                $pdd = Pendadaran::where('id', $pendadaran_id)->first();
                $mahasiswa_id = $pdd->mhs_id;
                $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
                $nim = $mhs_id->nim;
            }
            $file = $request->file('beritaacara');
            $filename = 'beritaAcara_pendadaran' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/beritaAcaraPendadaran', $filename);
            $data = [
                'pendadaran_id' => $request->pendadaran_id,
                'beritaacara' => $filename,
            ];
            $cek = BeritaAcaraPendadaran::create($data);
        } else {
            $data['doc'] = NULL;
        }
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Gagal Ditambahkan');
        }
        return back();
    }

    public function download($filename)
    {
        // dd($filename);
        // return response()->download(public_path('storage/assets/sk/' . $filename . ''));
        return response()->download(public_path('storage/assets/file/beritaAcaraPendadaran/' . $filename . ''));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaAcaraPendadaran  $beritaAcaraPendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaAcaraPendadaran $beritaAcaraPendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaAcaraPendadaran  $beritaAcaraPendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaAcaraPendadaran $beritaAcaraPendadaran)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = BeritaAcaraPendadaran::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Berita Acara');
        return back();
    }

    public function destroy($beritaacara)
    {
        $beritaacara = BeritaAcaraPendadaran::where('beritaacara', $beritaacara)->first();
        if ($beritaacara != null) {
            $beritaacara->delete();
            Alert::success('Berhasil', 'Berhasil hapus data Beita Acara');
            return back();
        }
        Alert::warning('Gagal', 'Data Berita Acara Gagal Dihapus');
        return back();
    }
}

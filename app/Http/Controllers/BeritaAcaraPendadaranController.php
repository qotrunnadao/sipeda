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
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $pendadaran = Pendadaran::with(['mahasiswa'])->find($id);
        $status = array(
            'no_surat' => $request->no_surat,
        );
        // dd($status);
        if ($pendadaran->update($status)) {
            Alert::success('Berhasil', 'Berhasil Tambah Nomer Berita Acara Ujian Pendadaran');
        } else {
            Alert::warning('Gagal', 'Data Nomer Berita Acara Ujian Pendadaran Gagal Ditambahkan');
        }
        return back();
    }

    public function download($filename)
    {
        // dd($filename);
        return response()->download(public_path('storage/assets/file/berita Acara Pendadaran/' . $filename . ''));
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
        dd($data);
        $value = Pendadaran::findOrFail($id);
        $hapus = $value->beritaacara;
        if ($request->file('beritaacara')) {
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('beritaacara');
            $filename = 'Berita Acara Pendadaran Terbaru' . '_' . $value->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Pendadaran/', $beritaacara);
            $data = [
                'statuspendadaran_id' => 5,
                'beritaacara' => $filename,
            ];
            // dd($data);
        } else {
            $data['beritaacara'] = $value->beritaacara;
            Alert::warning('Gagal', 'Gagal Ubah Data SPK');
            return back();
        }
        // dd($data);
        File::delete(public_path('storage/assets/file/Berita Acara Pendadaran/' . $hapus . ''));
        // dd($hapus);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Berita Acara Ujian Pendadaran');
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

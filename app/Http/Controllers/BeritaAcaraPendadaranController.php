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

        $beritaacara = DB::table('beritaacara_pendadaran')
            ->join('pendadaran', 'pendadaran.id', '=', 'beritaacara_pendadaran.pendadaran_id')
            ->join('mahasiswa', 'pendadaran.mhs_id', '=', 'mahasiswa.id')
            ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.id')
            ->select('beritaacara_pendadaran.beritaacara', 'mahasiswa.nama', 'mahasiswa.nim', 'jurusan.namaJurusan', 'beritaacara_pendadaran.created_at')
            ->latest()
            ->get();

        return view('beritaAcaraPendadaran.index', compact('beritaacara', 'jurusan', 'pendadaranAll'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaAcaraPendadaran  $beritaAcaraPendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = BeritaAcaraPendadaran::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Berita Acara');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaAcaraPendadaran  $beritaAcaraPendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaAcaraPendadaran $beritaAcaraPendadaran)
    {
        $beritaacara = BeritaAcaraPendadaran::where('beritaacara', $beritaAcaraPendadaran)->first();
        // $post =Post::where('id',$post_id)->first();
        if ($beritaacara != null) {
            $beritaacara->delete();
            Alert::success('Berhasil', 'Berhasil hapus data Beita Acara');
            return back();
        }
        Alert::warning('Gagal', 'Data Berita Acara Gagal Dihapus');
        return back();
    }
}
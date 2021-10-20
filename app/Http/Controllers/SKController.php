<?php

namespace App\Http\Controllers;

use App\Models\SK;
use App\Models\Jurusan;
use App\Models\Yudisium;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class SKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $yudisiumAll = Yudisium::with(['mahasiswa'])->get();
        $sk = SK::With('yudisium.mahasiswa.jurusan')->latest()->get();

        return view('yudisium.SK.index', compact('sk', 'jurusan', 'yudisiumAll'));
    }

    public function nim(Request $request)
    {
        $yudisiumAll = Yudisium::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '2')->get();
        // dd($taAll);
        return response()->json($yudisiumAll, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if ($request->file('fileSK')) {
            $sk = SK::latest()->get();
            foreach ($sk as $value) {
                $yudisium_id = $value->yudisium_id;
                $yds = Yudisium::where('id', $yudisium_id)->first();
                $mahasiswa_id = $yds->mhs_id;
                $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
                $nim = $mhs_id->nim;
            }
            $file = $request->file('fileSK');
            $filename = 'SK' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSK')->storeAS('public/assets/file/sk', $filename);
            $data = [
                'yudisium_id' => $request->yudisium_id,
                'fileSK' => $filename,
            ];
            $cek = SK::create($data);
        } else {
            $data['doc'] = NULL;
        }
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data SK');
        } else {
            Alert::warning('Gagal', 'Data SK Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function show(SK $sK)
    {
        //
    }

    public function download($filename)
    {
        // dd($filename);
        // return response()->download(public_path('storage/assets/sk/' . $filename . ''));
        return response()->download(public_path('storage/assets/file/sk/' . $filename . ''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function edit(SK $sK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = SK::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data SK');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SK  $sK
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileSK)
    {
        $sk = SK::where('fileSK', $fileSK)->first();
        // $post =Post::where('id',$post_id)->first();
        if ($sk != null) {
            $sk->delete();
            Alert::success('Berhasil', 'Berhasil hapus data SK');
            return back();
        }
        Alert::warning('Gagal', 'Data SK Gagal Dihapus');
        return back();
    }
}

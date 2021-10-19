<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $spk = SPK::latest()->get();
        $jurusan = jurusan::all();
        $taAll = TA::with(['mahasiswa'])->get();
        // $spk = SPK::with(['TA', 'TA.Mahasiswa'])->latest()->get();

        $spk = SPK::With('TA.mahasiswa.jurusan')->latest()->get();
        // dd($spk);
        return view('SPK.index', compact('spk', 'jurusan', 'taAll'));
    }

    public function nim(Request $request)
    {
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($request) {
            $query->where('jurusan_id', $request->id);
        })->where('status_id', '1')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
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
        if ($request->file('fileSPK')) {
            $spk = SPK::latest()->get();
            foreach ($spk as $value) {
                $ta_id = $value->TA_id;
                $ta = TA::where('id', $ta_id)->first();
                $mahasiswa_id = $ta->mahasiswa_id;
                $mhs_id = Mahasiswa::where('id', $mahasiswa_id)->first();
                $nim = $mhs_id->nim;
            }
            $file = $request->file('fileSPK');
            $filename = 'SPK' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSPK')->storeAS('public/assets/file', $filename);
            $data = [
                'TA_id' => $request->ta_id,
                'fileSPK' => $filename,
            ];
            $cek = SPK::create($data);
        } else {
            $data['doc'] = NULL;
        }
        // dd($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data SPK');
        } else {
            Alert::warning('Gagal', 'Data SPK Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function show(SPK $sPK)
    {
        //
    }

    public function download($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/' . $filename . ''));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    //     public function view($id)
    //    {
    //    	$data=SPK::find($id);

    //    	return view('viewproduct',compact('data'));

    //    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = SPK::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data SPK');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SPK  $sPK
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileSPK)
    {
        $spk = SPK::where('fileSPK', $fileSPK)->first();
        // $post =Post::where('id',$post_id)->first();
        if ($spk != null) {
            $spk->delete();
            Alert::success('Berhasil', 'Berhasil hapus data SPK');
            return back();
        }
        Alert::warning('Gagal', 'Data SPK Gagal Dihapus');
        return back();
    }
}

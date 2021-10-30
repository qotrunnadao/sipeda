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
use Illuminate\Support\Facades\Storage;
use PDF;

class SPKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $taAll = TA::with(['mahasiswa'])->get();

        $spk = SPK::With('TA.mahasiswa.jurusan')->latest()->get();
        // dd($spk);
        return view('TA.SPK.index', compact('spk', 'jurusan', 'taAll'));
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
        // dd($data);
        $jurusan = jurusan::all();
        $taAll = TA::with(['mahasiswa'])->where('id',$request->ta_id)->get()->first();
            $pdf = PDF::loadView('TA.SPK.download');
            $filename = 'SPK' . '_'.$taAll->mahasiswa->nim.'_' . time() . '.pdf';
            Storage::put('public/assets/file/'. $filename, $pdf->output());
            $data = [
                'TA_id' => $request->ta_id,
                'fileSPK' => $filename,
            ];
            $cek = SPK::create($data);
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

    public function eksport()
    {
        $jurusan = jurusan::all();
        $taAll = TA::with(['mahasiswa'])->get();

        $spk = SPK::With('TA.mahasiswa.jurusan')->latest()->get();
        // dd($taAll);
        $data = ['spk' => $spk, 'taAll' => $taAll, 'jurusan' => $jurusan];
        $pdf = PDF::loadView('TA.SPK.download', $data);

        $filename = 'SPK' . '_nim_' . time() . '.pdf';
        $cek = Storage::put('public/assets/file/'. $filename, $pdf->output());

        if($cek){
            $data = [
                'TA_id' => 5,
                'fileSPK' => $filename,
            ];
            SPK::create($data);
            Alert::success('Berhasil', 'Berhasil Tambah Data SPK');
        }else{
            Alert::warning('Gagal', 'Data SPK Gagal Ditambahkan');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\SPK;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use PDF;
use File;

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
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $spk = TA::with(['mahasiswa', 'spk'])->where('status_id', '>=', '4')->latest()->get();
        } else {
            $spk = TA::with(['mahasiswa', 'spk'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->where('status_id', '>=', '4')->latest()->get();
        }
        // $spk = TA::with('mahasiswa', 'spk')->where('status_id','>=' , '4')->latest()->get();
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
        $taAll = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
        $pdf = PDF::loadView('TA.SPK.download');
        $filename = 'SPK' . '_' . $taAll->mahasiswa->nim . '_' . time() . '.pdf';
        Storage::put('public/assets/file/SPK TA/' . $filename, $pdf->output());
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
        return response()->download(public_path('storage/assets/file/SPK TA/' . $filename . ''));
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
        $spk = SPK::where('ta_id', $id)->get()->first();
        // $hapus = $spk->fileSPK;
        $data = [
            'fileSPK' => $request->fileSPK,
        ];
        if ($request->file('fileSPK')) {
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('fileSPK');
            $filename = 'SPK Kajur' . '_' . $spk->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSPK')->storeAS('public/assets/file/SPK TA/', $filename);
            $data = [
                'fileSPK' => $filename,
            ];
            // dd($data);
        } else {
            $data['fileSPK'] = $spk->fileSPK;
            Alert::warning('Gagal', 'Gagal Ubah Data SPK');
            return back();
        }
        // dd($data);
        // File::delete(public_path('storage/assets/file/SPK TA/' . $hapus . ''));
        // dd($hapus);
        $spk->update($data);
        $taAll = TA::with(['mahasiswa'])->where('id', $id)->get()->first();
        $status = array(
            'status_id' => 5,
        );
        $taAll->update($status);
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
        $spk = SPK::with('ta')->where('fileSPK', $fileSPK)->first();
        // dd($spk->ta->id);
        // $post =Post::where('id',$post_id)->first();
        if ($spk != null) {
            File::delete(public_path('storage/assets/file/SPK TA/' . $fileSPK . ''));
            $spk->delete();
            $taAll = TA::with(['mahasiswa'])->where('id', $spk->ta->id)->get()->first();
            $status = array(
                'status_id' => 4,
            );
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil hapus data SPK');
            return back();
        }
        Alert::warning('Gagal', 'Data SPK Gagal Dihapus');
        return back();
    }

    public function eksport(Request $request, $id)
    {
        $ta_id = $request->route('id');

        $taAll = TA::with(['mahasiswa'])->where('id', $request->route('id'))->get()->first();
        // dd($taAll);


        $data = ['ta_id' => $ta_id, 'taAll' => $taAll];
        $pdf = PDF::loadView('TA.SPK.download', $data);

        $filename = 'SPK' . '_' . $taAll->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/SPK TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'TA_id' => $request->route('id'),
                'fileSPK' => $filename,
            ];
            SPK::create($data);

            Alert::success('Berhasil', 'Berhasil Tambah Data SPK');
        } else {
            Alert::warning('Gagal', 'Data SPK Gagal Ditambahkan');
        }
        return back();
    }
}

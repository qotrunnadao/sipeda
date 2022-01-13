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
use Carbon\Carbon;
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
        if (auth()->user()->level_id == 5 || auth()->user()->level_id == 1) {
            $spk = TA::with(['mahasiswa', 'spk'])->where('status_id', '>=', '5')->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orWhereHas('status', function ($q) use ($dosen_id){
                $q->where('pembimbing1_id', $dosen_id->id)
                ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();

            // Tabel Verifikasi
            $spkKajur = TA::with(['mahasiswa', 'spk'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->where('status_id', '4')->where('no_surat', '!=', null)->latest()->get();
            //    dd($spk);
        return view('TA.SPK.index', compact('spk', 'jurusan', 'taAll','spkKajur'));
        }
        elseif (auth()->user()->level_id == 3 ) {
            $spk = TA::with(['mahasiswa', 'spk'])->where('status_id', '>=', '5')
            ->orwhere('pembimbing1_id', $dosen_id->id)
            ->orWhere('pembimbing1_id', $dosen_id->id)->latest()->get();
            //    dd($spk);
        }elseif (auth()->user()->level_id == 2) {
            $spk = TA::with('mahasiswa', 'spk')->where('status_id', '>=', '4')->latest()->get();
        }
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
    public function create(Request $request, $id)
    {
        $data = $request->all();
        // dd($id);
        $taAll = TA::with(['mahasiswa'])->where('id', $id)->get()->first();
        $akademik = Akademik::where('mhs_id', $request->nim)->get()->first();
        $status = array(
            'no_surat' => $request->no_surat,
            'spkMulai' => $request->spkMulai,
            'spkSelesai' => $request->spkSelesai,
        );
        $waktuTA = array(
            'TAMulai' => $request->spkMulai,
        );
        $cek = $taAll->update($status);
        $waktu = $akademik->update($waktuTA);

        if ($cek == true && $waktu == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Nomer SPK Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Nomer SPK Tugas Akhir Gagal Ditambahkan');
        }
        return back();
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
            "fileSPK" => "mimes:pdf|max:10000"
        ]);
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
        if (File::exists(public_path('storage/assets/file/SPK TA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/SPK TA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
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
        $this->validate($request, [
            "fileSPK" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();
        $spk = SPK::where('ta_id', $id)->get()->first();
        $hapus = $spk->fileSPK;
        if ($request->file('fileSPK')) {
            $file = $request->file('fileSPK');
            $filename = 'SPK Kajur' . '_' . $spk->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('fileSPK')->storeAS('public/assets/file/SPK TA/', $filename);
            $data = [
                'fileSPK' => $filename,
            ];
            // dd($data);
            File::delete(public_path('storage/assets/file/SPK TA/' . $hapus . ''));
        } else {
            $data['fileSPK'] = $spk->fileSPK;
            Alert::warning('Gagal', 'Gagal Ubah Data SPK');
            return back();
        }
        // dd($data);
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
        // dd($tanggal);
        $taAll = TA::with(['mahasiswa.jurusan', 'Dosen1', 'Dosen2'])->where('id', $request->route('id'))->where('no_surat', '!=', null)->get()->first();
        $today = Carbon::parse($taAll->spkMulai)->isoFormat('D MMMM YYYY');
        $tanggal =  Carbon::parse($taAll->spkSelesai)->isoFormat('D MMMM YYYY');
        $dosen = Dosen::where('jurusan_id', $taAll->mahasiswa->jurusan_id)->where('isKajur', '1')->get()->first();
        // dd($dosen);
        $berkas = ['ta_id' => $ta_id, 'taAll' => $taAll, 'dosen' => $dosen];
        $pdf = PDF::loadView('TA.SPK.download', ['taAll' => $taAll, 'dosen' => $dosen, 'today' => $today, 'tanggal' => $tanggal])->setPaper('a4');

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

    public function berkas()
    {
        return view('TA.SPK.berkas');
    }
}

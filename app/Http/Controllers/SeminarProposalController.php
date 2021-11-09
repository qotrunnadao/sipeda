<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Ruang;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\SeminarProposal;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 3) {
            $semprop = SeminarProposal::with(['ta'])->whereHas('ta', function ($q) use ($dosen_id) {
                $q->where('pembimbing1_id', $dosen_id->id)
                ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
        }elseif(auth()->user()->level_id == 5){
            $semprop = SeminarProposal::with(['ta.mahasiswa'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orwhereHas('ta', function ($q) use ($dosen_id){
                $q->where('pembimbing1_id', $dosen_id->id)
                ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            // dd($semprop);
        }elseif(auth()->user()->level_id == 1){
            $semprop = SeminarProposal::with(['ta.mahasiswa'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                $q->where('jurusan_id', $dosen_id->jurusan_id);
            })->orwhereHas('ta', function ($q) use ($dosen_id){
                $q->where('pembimbing1_id', $dosen_id->id)
                ->orWhere('pembimbing2_id', $dosen_id->id);
            })->latest()->get();
            // dd($semprop);
        }else{
            $semprop = SeminarProposal::where('status', '=', '1')->latest()->get();
        }
        return view('TA.sempropTA.index', compact('semprop'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarProposal $seminarProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sempropAll = SeminarProposal::get();
        $semprop = SeminarProposal::find($id);
        $ruang = Ruang::get();
        return view('TA.sempropTA.edit', compact('semprop', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seminar_proposal = SeminarProposal::find($id);
        $data = $request->all();
        $data = [
            // 'ta_id' => $request->ta_id,
            // 'proposal' => $request->proposal,
            // 'beritaacara' => $request->beritaacara,
            'beritaacara_dosen' => $request->beritaacara_dosen,
            // 'jamMulai' => $request->jamMulai,
            // 'jamSelesai' => $request->jamSelesai,
            // 'tanggal' => $request->tanggal,
            // 'ruang_id' => $request->ruang_id,
            // 'status' => $request->status,
        ];

        if ($request->file('beritaacara_dosen')) {
            $semprop = SeminarProposal::with(['ta.mahasiswa'])->where('ta_id', $request->ta_id)->latest()->get();
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('beritaacara_dosen');
            $filename = 'Berita Acara Dosen SEMPROP' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara_dosen')->storeAS('public/assets/file/Berita Acara Dosen Semprop TA/', $filename);
            $data = [
                // 'ta_id' => $request->ta_id,
                // 'proposal' => $request->proposal,
                // 'beritaacara' => $request->beritaacara,
                'beritaacara_dosen' => $filename,
                // 'jamMulai' => $request->jamMulai,
                // 'jamSelesai' => $request->jamSelesai,
                // 'tanggal' => $request->tanggal,
                // 'ruang_id' => $request->ruang_id,
                // 'status' => $request->status,
                // 'nama' => $request->TA->mahasiswa->nama,
                // 'nim' => $request->TA->mahasiswa->nim,
                // 'namaJurusan' => $request->TA->mahasiswa->jurusan->namaJurusan,
            ];
        } else {
            $data['beritaacara'] = $seminar_proposal->beritaacara;
        }
        // dd($data);
        $seminar_proposal->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Proposal');
        return redirect(route('semprop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semprop = SeminarProposal::find($id);
        $semprop->delete();
        Alert::success('Berhasil', 'Berhasil hapus data Seminar Proposal');
        return back();
    }

    public function diterima(SeminarProposal $seminarProposal)
    {
        $data = array(
            'status' => 1,
        );
        // dd($seminarProposal);
        $seminarProposal->update($data);
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Diterima');
        return back();
    }
    public function ditolak(SeminarProposal $SeminarProposal)
    {
        $data = array(
            'status' => 2,
        );
        // dd($SeminarProposal);
        $SeminarProposal->update($data);
        Alert::warning('Gagal', 'Pengajuan Seminar Proposal Ditolak');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''));
    }
    public function eksport(Request $request, $id)
    {
        $ta_id = $request->route('id');

        $sempro = SeminarProposal::with(['TA.mahasiswa'])->where('ta_id',$request->route('id'))->get()->first();
        $taAll = TA::with(['mahasiswa'])->where('id',$request->route('id'))->get()->first();


        $data = ['ta_id' => $ta_id, 'sempro' => $sempro];
        $pdf = PDF::loadView('TA.SPK.download', $data);

        $filename = 'Berita Acara Seminar Proposal' . '_'.$sempro->ta->mahasiswa->nim.'_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semprop TA/'. $filename, $pdf->output());

        if($cek){
            $data = [
                'beritaacara' => $filename,
            ];
            // dd($data );
            $sempro->update($data);
            $status = array(
                'status_id' => 7,
            );
            // dd($status);
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Seminar Proposal');
        }else{
            Alert::warning('Gagal', 'Data Berita Acara Seminar Proposal Gagal Ditambahkan');
        }
        return back();
    }
}

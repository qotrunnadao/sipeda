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
use File;
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

        if (auth()->user()->level_id == 2) {
            $data = array(
                'semprop_all' => SeminarProposal::latest()->get(),
            );
        } else {
            $data = array(
                'semprop_all' => SeminarProposal::latest()->get(),
                'semprop_dosen' => SeminarProposal::with(['ta'])->whereHas('ta', function ($q) use ($dosen_id) {
                    $q->where('pembimbing1_id', $dosen_id->id)
                        ->orWhere('pembimbing2_id', $dosen_id->id);
                })->latest()->get(),
                'semprop_jurusan' => SeminarProposal::with(['ta.mahasiswa'])->whereHas('mahasiswa', function ($q) use ($dosen_id) {
                    $q->where('jurusan_id', $dosen_id->jurusan_id);
                })->latest()->get(),
            );
        }

        return view('TA.sempropTA.index', $data);
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
            'beritaacara' => $request->beritaacara,
        ];

        if ($request->file('beritaacara')) {
            $semprop = SeminarProposal::with(['ta.mahasiswa'])->where('ta_id', $request->ta_id)->latest()->get();
            // dd($seminar_proposal->ta->mahasiswa->nim);
            $file = $request->file('beritaacara');
            $filename = 'Berita Acara Dosen SEMPROP' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Semprop TA/', $filename);
            $data = [
                'beritaacara' => $filename,
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
        $taAll = TA::with(['mahasiswa'])->where('id', $semprop->ta->id)->get()->first();
        File::delete(public_path('storage/assets/file/Berita Acara Semprop TA/' . $semprop->beritaacara . ''));
        $semprop->delete();
        $status = array(
            'status_id' => 4,
        );
        $taAll->update($status);
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
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Berhasil Ditolak');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        return response()->download(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''));
    }
    public function eksport(Request $request, $id)
    {
        $id = $request->route('id');
        $ta_id =  SeminarProposal::where('id', $id)->get()->first();

        $sempro = SeminarProposal::with(['TA.mahasiswa'])->where('ta_id', $ta_id->ta_id)->get()->first();
        // dd($sempro->ta->mahasiswa->nim);
        $taAll = TA::with(['mahasiswa'])->where('id', $ta_id->ta_id)->get()->first();


        $data = ['id' => $id, 'sempro' => $sempro];
        $pdf = PDF::loadView('TA.SPK.download', $data);

        $filename = 'Berita Acara Seminar Proposal' . '_' . $sempro->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semprop TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            $sempro->update($data);
            $status = array(
                'status_id' => 7,
            );
            // dd($status);
            $taAll->update($status);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Seminar Proposal');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Seminar Proposal Gagal Ditambahkan');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Ruang;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
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
        $semprop = SeminarProposal::latest()->get();
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
        $data = $request->all();
        $value = SeminarProposal::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Seminar Proposal');
        return back();
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
        $seminarProposal->update($data);
        //dd($seminarProposal);
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Diterima');
        return back();
    }
    public function ditolak(SeminarProposal $seminarProposal)
    {
        $data = array(
            'status' => 2,
        );
        $seminarProposal->update($data);
        //dd($seminarProposal);
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Ditolak');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\StatusTA;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StatusTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'status' => StatusTA::get(),
        );
        return view('admin.TA.statusTA.index', $data);
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
        $cek = StatusTA::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Status TA');
        } else {
            Alert::warning('Gagal', 'Status TA Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusTA  $statusTA
     * @return \Illuminate\Http\Response
     */
    public function show(StatusTA $statusTA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusTA  $statusTA
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusTA $statusTA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusTA  $statusTA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = StatusTA::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status TA');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusTA  $statusTA
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusTA::find($id);
        $status->delete();
        Alert::success('Berhasil', 'Berhasil hapus status TA');
        return back();
    }
}

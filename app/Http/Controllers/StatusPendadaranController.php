<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPendadaran;
use RealRashid\SweetAlert\Facades\Alert;

class StatusPendadaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'status' => StatusPendadaran::get(),
        );
        return view('admin.pendadaran.statusPendadaran.index', $data);
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
        $cek = StatusPendadaran::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Status Pendadaran');
        } else {
            Alert::warning('Gagal', 'Status Pendadaran Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusPendadaran  $statusPendadaran
     * @return \Illuminate\Http\Response
     */
    public function show(StatusPendadaran $statusPendadaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusPendadaran  $statusPendadaran
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusPendadaran $statusPendadaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusPendadaran  $statusPendadaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = StatusPendadaran::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status Pendadaran');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusPendadaran  $statusPendadaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusPendadaran::find($id);
        $status->delete();
        Alert::success('Berhasil', 'Berhasil hapus status pendadaran');
        return back();
    }
}

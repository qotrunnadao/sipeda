<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusYudisium;
use RealRashid\SweetAlert\Facades\Alert;

class StatusYudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'status' => StatusYudisium::get(),
        );
        return view('statusYudisium.index', $data);
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
        $cek = StatusYudisium::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Status Yudisium');
        } else {
            Alert::warning('Gagal', 'Status Pendadaran Gagal Yudisium');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusYudisium  $statusYudisium
     * @return \Illuminate\Http\Response
     */
    public function show(StatusYudisium $statusYudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusYudisium  $statusYudisium
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusYudisium $statusYudisium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusYudisium  $statusYudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = StatusYudisium::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Status Yudisium');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusYudisium  $statusYudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusYudisium::find($id);
        $status->delete();
        Alert::success('Berhasil', 'Berhasil hapus status yudisium');
        return back();
    }
}

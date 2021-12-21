<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuangPendadaran;
use RealRashid\SweetAlert\Facades\Alert;

class RuangPendadaranController extends Controller
{
    public function index()
    {
        $data = array(
            'ruang' => RuangPendadaran::get(),
        );
        return view('admin.master.ruangPendadaran', $data);
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
        $cek = RuangPendadaran::create($data);
        if ($cek == true) {
            Alert::success('Berhasil', 'Berhasil Tambah Data Ruang Pendadaran');
        } else {
            Alert::warning('Gagal', 'Data Ruang Pendadaran Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $value = RuangPendadaran::findOrFail($id);
        $value->update($data);
        Alert::success('Berhasil', 'Berhasil Ubah Data Ruangan Pendadaran');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = RuangPendadaran::find($id);
        $jurusan->delete();
        Alert::success('Berhasil', 'Berhasil hapus Data Ruangan Pendadaran');
        return back();
    }
}

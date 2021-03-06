<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\DosenImport;
use App\Models\Dosen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'dosen' => Dosen::latest()->get(),
        );
        // dd($data);
        return view('admin.master.datadosen', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        $data = $request->all();
        // dd($dosen);
        if ($data['isKajur'] == '1' && $data['isKomisi'] == '1') {
            Alert::warning('Gagal', 'Gagal, Dosen Tidak bisa mengambil dua Pekerjaan');
            return back();
        } elseif ($data['isKomisi'] == '1') {
            $status = array(
                'level_id' => '1',
            );
        } elseif ($data['isKajur'] == '1') {
            $status = array(
                'level_id' => '5',
            );
        } else {
            Alert::warning('Gagal', 'Gagal Mengubah Status Dosen');
            return back();
        }
        $dosen->update($data);
        $user = User::where('id', $dosen->user_id)->get()->first();
        // dd($dosen);
        $user->update($status);
        // dd($user);
        Alert::success('Berhasil', 'Berhasil Mengubah Status Dosen');
        return redirect(route('dosen.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        //
    }

    public function import_excel(Request $request)
    {
        // validasi
        Excel::import(new DosenImport, request()->file('file'));
        Alert::success('Berhasil', 'Berhasil Import Data Dosen');
        return back();
    }
}

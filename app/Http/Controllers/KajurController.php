<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KajurController extends Controller
{
    public function index()
    {
        $data = array(
            'kajur' => Dosen::where('isKajur', 1)->latest()->get(),
        );
        return view('admin.master.datakajur', $data);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        $data = $request->all();
        $ubah = $dosen->update($data);
        // dd($database);
        if ($ubah == true) {
            Alert::success('Berhasil', 'Berhasil Mengubah Status Kajur');
        } else {
            Alert::warning('Gagal', 'Data Status Kajur Gagal Diubah');
        }
        return redirect(route('dataKajur'));
    }
}

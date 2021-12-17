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
        $dosen->update($data);
        Alert::success('Berhasil', 'Berhasil Mengubah Status Kajur');
        return redirect(route('dataKajur'));
    }
}

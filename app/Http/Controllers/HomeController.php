<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->level_id == 2) {
            return redirect()->route('admin.beranda');
        } elseif (auth()->user()->level_id == 1) {
            return redirect()->route('komisi.beranda');
        } elseif (auth()->user()->level_id == 3) {
            return redirect()->route('dosen.beranda');
        } elseif (auth()->user()->level_id == 5) {
            return redirect()->route('kajur.beranda');
        } elseif (auth()->user()->level_id == 4) {
            return redirect()->route('mahasiswa.menu');
        }
    }
}

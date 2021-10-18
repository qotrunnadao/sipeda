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
        if (Auth::check()) {
            if (auth()->user()->level_id == 2) {
                return redirect()->route('admin.route');
            } elseif (auth()->user()->level_id == 1) {
                return redirect()->route('komisi.route');
            } elseif (auth()->user()->level_id == 1) {
                return redirect()->route('dosen.route');
            } else {
                return redirect()->route('mhs.route');
            }
        } else {
            return redirect('/login')
                ->with('error', 'Email & Password are incorrect.');
        }
        // return view('home');
    }
}

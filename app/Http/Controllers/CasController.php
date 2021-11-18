<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;
use Illuminate\Support\Facades\Auth;
use phpCAS;
use RealRashid\SweetAlert\Facades\Alert;

class CasController extends Controller
{
    protected $id;
    protected $session;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function callback()
    {
        phpCAS::client(CAS_VERSION_2_0, config('cas.cas_hostname'), config('cas.cas_port'), '');
        phpCAS::setNoCasServerValidation();
        phpCAS::forceAuthentication();
        $username = phpCAS::getUser();
        $user = User::where(['email' => $username])->first();
        if ($user != null) {
            Auth::login($user);
        } else {
            return false;
        }
        if (Auth::check()) {
            //dd($username);
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
        } else {
            Alert::warning('Gagal', 'Anda gagal login');
            return back();
        }
    }

    public function logout()
    {
        phpCAS::client(CAS_VERSION_2_0, config('cas.cas_hostname'), config('cas.cas_port'), '');
        phpCAS::setNoCasServerValidation();
        phpCAS::forceAuthentication();
        $_SESSION['user'] = phpCAS::getUser();
        //dd($_SESSION);
        if (phpCAS::isAuthenticated()) {
            unset($_SESSION['user']);
            phpCAS::logout();
            session()->flush();
            return redirect('/')->withSuccess('Terimakasih, selamat datang kembali!');
        }
    }


    public function logoutcas()
    {

        if (phpCAS::isAuthenticated()) {
            phpCAS::logout();
        } else {
            redirect('/');
        }
    }
}

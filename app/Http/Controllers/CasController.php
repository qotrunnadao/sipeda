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
            return redirect()->intended('/admin/beranda');
        } else {
            Alert::warning('Gagal', 'Anda gagal login');
            return back();
        }
    }
}

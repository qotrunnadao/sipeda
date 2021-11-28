<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Subfission\Cas\Facades\Cas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::BERANDA;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', $request->password)->get()
            ->first();

            if ($user != null){
                if (Auth::loginUsingId($user->id)) {
                    $request->session()->regenerate();
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
            }else{
                Alert::warning('Gagal', 'Anda gagal login');
                return back();
            }

    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        Alert::warning('Gagal', 'Anda gagal login');
        return back();
    }
}

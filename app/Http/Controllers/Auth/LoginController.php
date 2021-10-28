<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    // protected $redirectTo = RouteServiceProvider::HOME;

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
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('password', $request->password)->get()
            ->first();
        // dd($user);

        if (auth()->loginUsingId($user->id)) {
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
            return redirect('/login')
                ->with('error', 'Login Failed.');
        }
    }
}

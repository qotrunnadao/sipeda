<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasController extends Controller
{
    public function callback()
    {
        // $username = Cas::getUser();
        // Here you can store the returned information in a local User model on your database (or storage).

        // This is particularly usefull in case of profile construction with roles and other details
        // e.g. Auth::login($local_user);

        return redirect()->url('/');
    }
}

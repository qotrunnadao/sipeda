<?php

namespace App\Http\Controllers;

use App\Models\Akademik;
use App\Models\Status;
use App\Models\StatusKP;
use App\Models\StatusNilai;
use App\Models\StatusPendadaran;
use App\Models\StatusTA;
use App\Models\StatusYudisium;
use Illuminate\Http\Request;

class BerandaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'status' => Status::latest()->get(),
            'statusnilai' => StatusNilai::latest()->get(),
            'statusKP' => StatusKP::latest()->get(),
            'statusTA' => StatusTA::latest()->get(),
            'statusPendadaran' => StatusPendadaran::latest()->get(),
            'statusYudisium' => StatusYudisium::latest()->get(),
            'akademik' => Akademik::latest()->get(),
        );
        return view('admin.master.beranda', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

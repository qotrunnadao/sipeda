<?php

namespace App\Http\Controllers;

use App\Models\PeriodeYudisium;
use Illuminate\Http\Request;

class PeriodeYudisiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'periode' => PeriodeYudisium::get(),
        );
        return view('yudisium.periode.index', $data);
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
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodeYudisium $periodeYudisium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodeYudisium $periodeYudisium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PeriodeYudisium $periodeYudisium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriodeYudisium  $periodeYudisium
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodeYudisium $periodeYudisium)
    {
        //
    }
}

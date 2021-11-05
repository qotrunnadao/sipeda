<?php

namespace App\Http\Controllers;

use App\Models\TA;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Status;
use App\Models\Seminar;
use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use Illuminate\Http\Request;
use App\Models\SeminarProposal;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class SeminarProposalMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = Auth::User()->id;
        $user_id = User::where('id', $id)->get()->first();
        $mhs_id = Mahasiswa::with(['user'])->where('user_id', $id)->get()->first();
        $tugas_akhir = TA::where('mahasiswa_id', $mhs_id->id)->latest()->first();
        $Ruang = Ruang::get();
        $SeminarProposal = SeminarProposal::with(['ta', 'ruang'])->where('ta_id', $tugas_akhir->id)->select('*')->latest()->get();
        // dd($SeminarProposal);
        return view('mahasiswa.TA.pages.semprop', compact('SeminarProposal', 'tugas_akhir', 'Ruang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('proposal')) {
            $jamMulai = $request->jamMulai;
            $jamSelesai = $request->jamSelesai;
            $ruang = $request->ruang;
            $tanggal = $request->tanggal;
            $today = Carbon::now()->addDays(4)->isoFormat('Y M D');

            if ($tanggal >= $today) {
                $semhasCount = SeminarHasil::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                $semproCount = SeminarProposal::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                $seminarCount = Seminar::where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                    $query->where(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                        $query->where('tanggal', '=', $tanggal)
                            ->where('jamMulai', '>=', $jamMulai)
                            ->where('jamSelesai', '<', $jamMulai)
                            ->where('ruang_id', '=', $ruang);
                    })
                        ->orWhere(function ($query) use ($tanggal, $jamMulai, $jamSelesai, $ruang) {
                            $query->where('jamMulai', '<', $jamSelesai)
                                ->where('jamSelesai', '>=', $jamSelesai)
                                ->where('tanggal', '=', $tanggal)
                                ->where('ruang_id', '=', $ruang);
                        });;
                })->count();
                // dd($tanggalCount);

                if (!$semhasCount && !$semproCount && !$seminarCount) {
                    $id = Auth::User()->id;
                    $user_id = User::where('id', $request->user)->get()->first();
                    $mhs_id = Mahasiswa::with(['user'])->where('user_id', $request->user_id)->get()->first();
                    $nim = $mhs_id->nim;
                    $file = $request->file('proposal');
                    $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('proposal')->storeAS('public/assets/file/ProposalTA', $filename);
                    $data = [
                        'ta_id' => $request->ta_id,
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruang_id' => $ruang,
                        'status' => $request->status,
                        'proposal' => $filename,
                    ];
                    $cek = SeminarProposal::create($data);
                    Alert::success('Berhasil', 'Pengajuan Seminar Proposal telah Berhasil');
                } else {
                    Alert::warning('Gagal', 'Pengajuan Seminar Proposal Gagal Ditambahkan, Ruangan Sudah Digunakan');
                }
            } else {
                Alert::warning('Gagal', 'Pengajuan Seminar Proposal diajukan minimal 4 Hari Sebelum Pelaksanaan Seminar');
            }
        } else {
            $data['doc'] = NULL;
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TA  $tA
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
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TA  $tA
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}

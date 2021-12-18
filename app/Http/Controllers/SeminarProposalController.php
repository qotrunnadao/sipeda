<?php

namespace App\Http\Controllers;

use App\Models\TA;
use App\Models\Ruang;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Models\SeminarHasil;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;
use App\Models\SeminarProposal;
use RealRashid\SweetAlert\Facades\Alert;

class SeminarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user_id = User::with(['dosen'])->where('id', $id)->get()->first();
        $dosen_id = Dosen::with(['user'])->where('user_id', $id)->get()->first();
        if (auth()->user()->level_id == 2) {
            $data = array(
                'semprop_all' => SeminarProposal::latest()->get(),
            );
        } else {
            $data = array(
                'semprop_all' => SeminarProposal::latest()->get(),
                'semprop_dosen' => SeminarProposal::with(['ta'])->whereHas('ta', function ($q) use ($dosen_id) {
                    $q->where('pembimbing1_id', $dosen_id->id)
                        ->orWhere('pembimbing2_id', $dosen_id->id);
                })->latest()->get(),
                'semprop_jurusan' => SeminarProposal::with(['TA.Mahasiswa'])->whereHas('Mahasiswa', function ($query) use ($dosen_id) {
                    $query->where('jurusan_id', $dosen_id->jurusan_id);
                })->where('status', '!=', '2')->latest()->get(),
            );
            // dd($dosen_id->jurusan_id);
        }

        return view('TA.sempropTA.index', $data);
    }

    public function nim(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $taAll = TA::with(['mahasiswa'])->whereHas('mahasiswa', function (Builder $query) use ($id) {
            $query->where('jurusan_id', $id);
        })->where('status_id', '5')->get();
        // dd($taAll);
        return response()->json($taAll, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_semprop = new SeminarProposal();
        $semprop = SeminarProposal::get();
        $mhs = Mahasiswa::all();
        $jurusan = jurusan::all();
        $Ruang = Ruang::get();
        return view('TA.sempropTA.create', compact('data_semprop', 'semprop', 'mhs', 'Ruang', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "proposal" => "mimes:pdf|max:10000"
        ]);
        $data = $request->all();

        if ($request->file('proposal')) {
            $jamMulai = $request->jamMulai;
            $jamSelesai = $request->jamSelesai;
            $ruang = $request->ruang;
            $tanggal =  Carbon::parse($request->tanggal)->isoFormat('Y-M-DD');
            // $tanggal = date('Y-m-d', strtotime($request->tanggal));
            $today = Carbon::now()->addDays(3)->isoFormat('Y-M-DD');
            // dd($tanggal >= $today);

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

                if (!$semhasCount && !$semproCount && !$seminarCount) {
                    $ta_id = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
                    // dd($tanggalCount);
                    $nim = $ta_id->mahasiswa->nim;
                    $file = $request->file('proposal');
                    $filename = 'TA' . '_' . $nim . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $path = $request->file('proposal')->storeAS('public/assets/file/ProposalTA/', $filename);
                    $data = [
                        'ta_id' => $request->ta_id,
                        'jamMulai' => $jamMulai,
                        'jamSelesai' => $jamSelesai,
                        'tanggal' => $request->tanggal,
                        'ruang_id' => $ruang,
                        'status' => '1',
                        'no_surat' => $request->no_surat,
                        'proposal' => $filename,
                    ];
                    $cek = SeminarProposal::create($data);
                    $taAll = TA::with(['mahasiswa'])->where('id', $request->ta_id)->get()->first();
                    $status = array(
                        'status_id' => 6,
                        'judulTA' => $request->judul,
                    );
                    // dd($status);
                    $taAll->update($status);
                    Alert::success('Berhasil', 'Pengajuan Seminar Proposal telah Berhasil');
                } else {
                    Alert::warning('Gagal', 'Pengajuan Seminar Proposal Gagal Ditambahkan, Ruangan Sudah Digunakan');
                }
            } else {
                Alert::warning('Gagal', 'Pengajuan Seminar Proposal diajukan minimal 3 Hari Sebelum Pelaksanaan Seminar');
            }
        } else {
            $data['doc'] = NULL;
        }
        return redirect(route('semprop.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $taAll = SeminarProposal::with(['mahasiswa'])->where('id', $id)->get()->first();
        // dd($taAll);
        $status = array(
            'no_surat' => $request->no_surat,
        );
        if ($taAll->update($status)) {
            Alert::success('Berhasil', 'Berhasil Tambah Nomer Berita Acara Seminar Proposal Tugas Akhir');
        } else {
            Alert::warning('Gagal', 'Data Nomer Berita Acara Seminar Proposal Tugas Akhir Gagal Ditambahkan');
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sempropAll = SeminarProposal::get();
        $semprop = SeminarProposal::find($id);
        $ruang = Ruang::get();
        return view('TA.sempropTA.edit', compact('semprop', 'ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "beritaacara" => "mimes:pdf|max:10000"
        ]);
        $seminar_proposal = SeminarProposal::find($id);
        $data = $request->all();
        $hapus = $seminar_proposal->proposal;
        $hapus1 = $seminar_proposal->beritaacara;
        // dd($data);
        if ($request->file('beritaacara') && $request->file('proposal')) {
            $file = $request->file('beritaacara');
            $file1 = $request->file('proposal');
            // dd($file);
            $filename = 'Berita Acara Dosen SEMPROP' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filename1 = 'TA' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file1->getClientOriginalExtension();

            $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Semprop TA/', $filename);
            $path1 = $request->file('proposal')->storeAS('public/assets/file/ProposalTA/', $filename1);

            $data = [
                'beritaacara' => $filename,
                'proposal' => $filename1,
            ];

            File::delete(public_path('storage/assets/file/ProposalTA/' . $hapus . ''));
            File::delete(public_path('storage/assets/file/Berita Acara Semprop TA/' . $hapus1 . ''));

            $status = array(
                'status_id' => 7,
            );
            $taAll = TA::with(['mahasiswa'])->where('id', $seminar_proposal->ta_id)->get()->first();
            // dd($status);
            $taAll->update($status);
            $seminar_proposal->update($data);
            Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Proposal');
        }
        if ($request->file('beritaacara')) {
            $file = $request->file('beritaacara');
            // dd($file);
            $filename = 'Berita Acara Dosen SEMPROP' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('beritaacara')->storeAS('public/assets/file/Berita Acara Semprop TA/', $filename);
            $data = [
                'beritaacara' => $filename,
            ];
            File::delete(public_path('storage/assets/file/Berita Acara Semprop TA/' . $hapus1 . ''));
            $status = array(
                'status_id' => 7,
            );
            $taAll = TA::with(['mahasiswa'])->where('id', $seminar_proposal->ta_id)->get()->first();
            // dd($status);
            $taAll->update($status);
            $seminar_proposal->update($data);
            Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Proposal');
        } else {
            $data['beritaacara'] = $seminar_proposal->beritaacara;
        }
        if ($request->file('proposal')) {
            $file = $request->file('proposal');
            // dd($file);
            $filename = 'TA' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('proposal')->storeAS('public/assets/file/ProposalTA/', $filename);
            $data = [
                'proposal' => $filename,
            ];
            File::delete(public_path('storage/assets/file/ProposalTA/' . $hapus . ''));
            $seminar_proposal->update($data);
            Alert::success('Berhasil', 'Berhasil Mengubah Data Seminar Proposal');
        } else {
            $data['proposal'] = $seminar_proposal->proposal;
        }
        if ($request->file('berita')) {
            $file = $request->file('berita');
            $filename = 'Berita Acara Dosen SEMPROP' . '_' . $seminar_proposal->ta->mahasiswa->nim . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $request->file('berita')->storeAS('public/assets/file/Berita Acara Semprop TA/', $filename);
            $data = [
                'beritaacara' => $filename,
            ];
            File::delete(public_path('storage/assets/file/Berita Acara Semprop TA/' . $hapus1 . ''));
            $status = array(
                'status_id' => 7,
            );
            $taAll = TA::with(['mahasiswa'])->where('id', $seminar_proposal->ta_id)->get()->first();
            // dd($taAll);
            // dd($status);
            $taAll->update($status);
            $seminar_proposal->update($data);

            Alert::success('Berhasil', 'Berhasil Mengubah Berita Acara Seminar Proposal');
        } else {
            $data['berita'] = $seminar_proposal->beritaacara;
        }
        // dd($data);
        return redirect(route('semprop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semprop = SeminarProposal::find($id);
        $taAll = TA::with(['mahasiswa'])->where('id', $semprop->ta->id)->get()->first();
        File::delete(public_path('storage/assets/file/Berita Acara Semprop TA/' . $semprop->beritaacara . ''));
        File::delete(public_path('storage/assets/file/ProposalTA/' . $semprop->proposal . ''));
        $semprop->delete();
        $status = array(
            'status_id' => 4,
        );
        $taAll->update($status);
        Alert::success('Berhasil', 'Berhasil hapus data Seminar Proposal');
        return back();
    }

    public function diterima(SeminarProposal $seminarProposal)
    {
        $data = array(
            'status' => 1,
        );
        // dd($seminarProposal);
        $seminarProposal->update($data);
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Diterima');
        return back();
    }
    public function ditolak(SeminarProposal $SeminarProposal)
    {
        $data = array(
            'status' => 2,
        );
        // dd($SeminarProposal);
        $SeminarProposal->update($data);
        Alert::success('Berhasil', 'Pengajuan Seminar Proposal Berhasil Ditolak');
        return back();
    }
    public function download($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/Berita Acara Semprop TA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function proposal($filename)
    {
        //    dd($filename);
        if (File::exists(public_path('storage/assets/file/ProposalTA/' . $filename . ''))) {
            return response()->file(public_path('storage/assets/file/ProposalTA/' . $filename . ''));
        } else {
            Alert::warning('Gagal', 'File Tidak Tersedia');
            return back();
        }
    }
    public function eksport(Request $request, $id)
    {
        $id = $request->route('id');
        $ta_id =  SeminarProposal::with(['TA.mahasiswa.Jurusan', 'TA.Dosen1', 'TA.Dosen2', 'ruang'])->where('id', $id)->where('no_surat', '!=', null)->get()->first();
        $dosen = Dosen::where('jurusan_id', $ta_id->ta->mahasiswa->jurusan_id)->where('isKajur', '1')->get()->first();
        $hari = Carbon::parse($ta_id->tanggal)->isoFormat('dddd D MMMM YYYY');
        $spk = Carbon::parse($ta_id->tanggal)->isoFormat('D MMMM YYYY');
        $jamMulai = Carbon::parse($ta_id->jamMulai)->isoFormat('H:mm');
        $jamSelesai = Carbon::parse($ta_id->jamSelesai)->isoFormat('H:mm');
        // dd($jamMulai);
        $taAll = TA::with(['mahasiswa'])->where('id', $ta_id->ta_id)->get()->first();
        $pdf = PDF::loadView('TA.sempropTA.berkas', ['ta_id' => $ta_id, 'dosen' => $dosen, 'hari' => $hari, 'spk' => $spk, 'jamMulai' => $jamMulai, 'jamSelesai' => $jamSelesai])->setPaper('a4');

        $filename = 'Berita Acara Seminar Proposal' . '_' . $ta_id->ta->mahasiswa->nim . '_' . time() . '.pdf';

        $cek = Storage::put('public/assets/file/Berita Acara Semprop TA/' . $filename, $pdf->output());

        if ($cek) {
            $data = [
                'beritaacara' => $filename,
            ];
            $ta_id->update($data);
            Alert::success('Berhasil', 'Berhasil Tambah Data Berita Acara Seminar Proposal');
        } else {
            Alert::warning('Gagal', 'Data Berita Acara Seminar Proposal Gagal Ditambahkan');
        }
        return back();
    }

    public function berkas()
    {
        return view('TA.sempropTA.berkas');
    }
}

@extends('mahasiswa.yudisium.layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Admin')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left img-hover" src="{{ asset('sitak/assets/images/party.svg') }}" alt="" style="width: 150px">
                <h1 class="card-title text-white text-center mt-5 welcome">Selamat Datang, {{$mhs_id->nama}}!</h1>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom text-center pb-4">
                    @if (Auth::user()->foto)
                    <img src="{{ $mhs_id->foto }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @else
                    <img src="{{ asset('sitak/assets/images/profile.jpg') }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @endif
                    <div class="d-flex justify-content-center">
                        <div class="badge badge-gradient-primary  card-hover">{{$mhs_id->nama}}</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi Yudisium Anda</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> IP Terakhir </td>
                                <td>:</td>
                                <td> 3,93 </td>
                            </tr>
                            <tr>
                                <td> IPK </td>
                                <td>:</td>
                                <td> 3,84 </td>
                            </tr>
                            <tr>
                                <td> Total SKS </td>
                                <td>:</td>
                                <td> 138 </td>
                            </tr>
                            <tr>
                                <td> Tanggal Yudisium </td>
                                <td>:</td>
                                <td> 08 Juni 2022 </td>
                            </tr>
                            <tr>
                                <td> Waktu </td>
                                <td>:</td>
                                <td> 09:00 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">File Unduhan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Surat Undangan </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> SK Kelulusan </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Status Pelaksanaan Studi Akhir</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th> Status Tugas Akhir </th>
                                <th> Status Pendadaran </th>
                                <th> Status Yudisium </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani </td>
                                <td>
                                    <div class="badge badge-success badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-success badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Disetujui</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-primary card-img-holder text-white  card-hover">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Persyaratan Mengajukan Yudisium
                </h4>
                <ul>
                    <li>Menyerahkan Surat Perintah Kerja(SPK) Tugas Akhir</li>
                    <li>Berkas Penilaian Komprehensif (Pendadaran) disiapkan Bapendik</li>
                    <li>Distribusi Jilid Laporan Tugas Akhir ke: PII Fakultas Teknik, Pembimbing 1 dan 2 menggunakan FORM Distribusi</li>
                    <li>Bukti Jilid Laporan Tugas akhir ke Perpustakaan UNSOED</li>
                    <li>Surat Cuti Akademik (apabila pernah cuti dan <b>Wajib di lampirkan</b>) </li>
                    <li>Foto Copy Ijazah SMA/SMK (<b>Wajib di lampirkan</b>)</li>
                    <li>Mengisi Surat Keterangan Pendamping Ijazah pada SIA, di cetak serta lampirkan foto copy sertifikat</li>
                    <li>Biodata mahasiswa adalah biodata a pada saat mendaftar wisuda setelah yudisium Fakultas</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

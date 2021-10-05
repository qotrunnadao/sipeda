@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'beranda mahasiswa')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left img-start" src="{{ asset('sitak/assets/images/welcome.svg') }}" alt="" style="width: 200px">
                <h1 class="card-title text-white text-center mt-5">Selamat Datang, QOTRUNNADA OKTIRIANI!</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom text-center pb-4">
                    <img src="{{ asset('sitak/assets/images/faces/atun.jpg') }}" alt="profile" class="img-lg rounded-circle mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="badge badge-gradient-primary">Qotrunnada Oktiriani</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi Pendadaran Anda</h4>
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
                                <td> Tanggal Pendadaran </td>
                                <td>:</td>
                                <td> 08 Juni 2022 </td>
                            </tr>
                            <tr>
                                <td> Waktu </td>
                                <td>:</td>
                                <td> 09:00 </td>
                            </tr>
                            <tr>
                                <td> Dosen Penguji 1 </td>
                                <td>:</td>
                                <td> Ipung Permadi </td>
                            </tr>
                            <tr>
                                <td> Dosen Penguji 2 </td>
                                <td>:</td>
                                <td> Noviyati </td>
                            </tr>
                            <tr>
                                <td> Dosen Penguji 3 </td>
                                <td>:</td>
                                <td> Lasmedi Afuan </td>
                            </tr>
                            <tr>
                                <td> Dosen Penguji 4 </td>
                                <td>:</td>
                                <td> Lasmedi Afuan </td>
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
                                <td> Surat Tugas Pendadaran </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> Laporan Hasil Pendadaran </td>
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
    <div class="col-12 grid-margin stretch-card">
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
                                    <div class="badge badge-warning badge-pill">Menunggu Persetujuan</div>
                                </td>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum Mengajukan</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
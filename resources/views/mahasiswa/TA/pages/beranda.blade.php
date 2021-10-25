@extends('mahasiswa.TA.layouts.main')
@section('icon', 'home')
@section('title', 'Beranda')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left" src="{{ asset('sitak/assets/images/hello.svg') }}" alt="" style="width: 250px">
                <h1 class="card-title text-white text-center mt-5">Selamat Datang, {{ auth()->user()->email }}!</h1>
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
                <h4 class="card-title mb-4">Deskripsi TA Anda</h4>
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
                                <td> Judul Penelitian </td>
                                <td>:</td>
                                <td> SIPETA </td>
                            </tr>
                            <tr>
                                <td> Lokasi </td>
                                <td>:</td>
                                <td> Fakultas Teknik UNSOED </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> SPK Tanggal </td>
                                <td>:</td>
                                <td> 24/10/2000 </td>
                            </tr>
                            <tr>
                                <td> SPK diambil </td>
                                <td>:</td>
                                <td> 26/10/2000 </td>
                            </tr>
                            <tr>
                                <td> SPK Berakhir </td>
                                <td>:</td>
                                <td> 24/10/2022 </td>
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
                <h4 class="card-title mb-3">Tahapan TA</h4>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column todo-list todo-list-custom">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Pengajuan Pra Proposal <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Review Administratif oleh Bapendik <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Review Komisi TA <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Pengajuan Proposal <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Pencetakan SPK <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Pengajuan Seminar Proposal <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Persetujuan Seminar Proposal <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Konsultasi TA <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Pengajuan Seminar Hasil <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Persetujuan Seminar Hasil <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Distribusi Dokumen <i class="input-helper"></i></label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> SELESAI <i class="input-helper"></i></label>
                            </div>
                        </li>
                    </ul>
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
                                    <div class="badge badge-primary badge-pill">Pelaksanaan</div>
                                </td>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum Mengajukan</div>
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

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">File Unduhan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Berita Acara Seminar Proposal </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> Berita Acara Seminar Hasil </td>
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
</div>

@endsection

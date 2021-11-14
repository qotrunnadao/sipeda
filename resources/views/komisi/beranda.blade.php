@extends('layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Komisi')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Jurusan Pelaksanaan Tugas Akhir <i class="mdi mdi-clock-fast mdi-24px float-right"></i>
                </h5>
                <h2>0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Jurusan Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>36</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3"> Jumlah Dosen Jurusan<i class="mdi mdi-account-multiple-outline mdi-24px float-right"></i>
                </h5>
                <h2>45</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan Pelaksanaan Tugas Akhir<i class="mdi mdi-clock-fast mdi-24px float-right"></i>
                </h5>
                <h2>45</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>45</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-dark card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Total Mahasiswa Bimbingan<i class="mdi mdi-tag-multiple mdi-24px float-right"></i>
                </h5>
                <h2>45</h2>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Rekap Data Dosen Pembimbing</h5>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Dosen</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td> 1 </td>
                                <td> Teguh Cahyono </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#detail"><i class="mdi mdi-information"></i></a>
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
                <h5 class="card-title mb-5">Rekap Pelaksanaan Studi Akhir</h5>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama </th>
                                <th> Status Tugas Akhir </th>
                                <th> Status Pendadaran </th>
                                <th> Status Yudisium </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-success badge-pill">menunggu persetujuan</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail3">Mahasiswa Bimbingan Proses Pelaksanaan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="topik" id="name" value="5" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Mahasiswa Bimbingan Selesai Tugas Akhir</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="hasil" value="10" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Total Keseluruhan Mahasiswa Bimbingan</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="hasil" value="15" readonly />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

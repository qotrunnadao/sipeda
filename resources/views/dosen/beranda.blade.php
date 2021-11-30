@extends('layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Dosen')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan
                    <br><b>{{$dosen_id->nama }}</b>
                    <br>Pelaksanaan Tugas Akhir<i class="mdi mdi-clock-fast mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '4')->count() + $dosen_id->TA2->where('status_id', '>=', '4')->count() }}</h2>
            </div>
        </div>
    </div>
    {{-- {{ dd($dosen->TA1->where('status_id', '>=', '4')) }} --}}
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Bimbingan
                    <br><b>{{$dosen_id->nama }}</b>
                    <br>Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '10')->count() + $dosen_id->TA2->where('status_id', '>=', '10')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Total Mahasiswa Bimbingan
                    <br><b>{{$dosen_id->nama }}</b><i class="mdi mdi-tag-multiple mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->TA1->where('status_id', '>=', '4')->count() + $dosen_id->TA2->where('status_id', '>=', '4')->count() }}</h2>
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

@endsection

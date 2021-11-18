@extends('layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Admin')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Menunggu Verifikasi<i class="mdi mdi-bell-outline mdi-24px float-right"></i>
                </h5>
                <h2>0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Pelaksanaan TA<i class="mdi mdi-timetable mdi-24px float-right"></i>
                </h5>
                <h2>36</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Selesai TA<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>45</h2>
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
                                <th> Nama Mahasiswa </th>
                                <th> IPK </th>
                                <th> SKS </th>
                                <th> Status KP </th>
                                <th> Status TA </th>
                                <th> Status Pendadaran</th>
                                <th> Status Yudisium</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($akademik as $value)
                            <tr>
                                <td> 1 </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->ipk }}</td>
                                <td> {{ $vavue->sks }}</td>
                                <td>
                                    <div class="badge badge-primary badge-pill">{{ $value->isKP }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-waring badge-pill">{{ $value->isTA }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-success badge-pill">{{ $value->isPendadaran }}</div>
                                </td>
                                <td>
                                    <div class="badge badge-info badge-pill">{{ $value->isYudisium }}</div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

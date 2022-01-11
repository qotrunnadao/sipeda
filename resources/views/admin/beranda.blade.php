@extends('layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Admin')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Pengajuan Tugas Akhir<i class="mdi mdi-bell-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $tugas_akhir->where('status_id', '=', '2')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Pelaksanaan Tugas Akhir<i class="mdi mdi-timetable mdi-24px float-right"></i>
                </h5>
                <h2>{{ $tugas_akhir->where('status_id', '>=', '4')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Selesai Tugas Akhir<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $tugas_akhir->where('status_id', '=', '10')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Pengajuan Pendadaran<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $pendadaran->where('statusPendadaran_id', '=', '1')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Selesai Pendadaran<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $pendadaran->where('statusPendadaran_id', '=', '7')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-dark card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Pengajuan Yudisium<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $yudisium->where('statusYudisium_id', '=', '1')->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5">Rekap Pelaksanaan Studi Akhir</h5>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Tahun Angkatan</th>
                                <th> IPK </th>
                                <th> SKS </th>
                                <th> Status TA </th>
                                <th> Status Pendadaran</th>
                                <th> Status Yudisium</th>
                                <th> Lama Tugas Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($akademik as $value)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td>{{ $value->mahasiswa->angkatan }}</td>
                                <td> {{ $value->ipk }}</td>
                                <td> {{ $value->sks }}</td>
                                <td>
                                    @if($value->statusTA == null)
                                    <div class="badge badge-danger badge-pill">Belum Mengajukan</div>
                                    @elseif($value->ta->status_id == 1)
                                    <div class="badge badge-danger badge-pill">{{ $value->ta->status->ket}}</div>
                                    @else
                                    <div class="badge badge-primary badge-pill">{{ $value->ta->status->ket }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($value->statusPendadaran == null)
                                    <div class="badge badge-danger badge-pill">Belum Mengajukan</div>
                                    @elseif($value->pendadaran->statuspendadaran_id == 1)
                                    <div class="badge badge-danger badge-pill">{{ $value->pendadaran->StatusPendadaran->status }}</div>
                                    @else
                                    <div class="badge badge-primary badge-pill">{{ $value->pendadaran->StatusPendadaran->status }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($value->statusYudisium == null)
                                    <div class="badge badge-danger badge-pill">Belum Mengajukan</div>
                                    @elseif($value->yudisium->status_id == 1)
                                    <div class="badge badge-danger badge-pill">{{ $value->yudisium->StatusYudisium->status }}</div>
                                    @else
                                    <div class="badge badge-primary badge-pill">{{ $value->yudisium->StatusYudisium->status }}</div>
                                    @endif
                                </td>
                                <td> {{ $value->TASelesai }}</td>
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
{{-- @if($value->has('TA'))
<td>
    <div class="badge badge-primary badge-pill">{{ $value->TA->first()->status->ket }}</div>
</td>
@else
<td>
    <div class="badge badge-primary badge-pill">Belum Mengajukan</div>
</td>
@endif
@if($value->whereDoesntHave('Pendadaran'))
<td>
    <div class="badge badge-primary badge-pill">Belum Mengajukan</div>
</td>
@elseif($value->has('Pendadaran'))
<td>
    <div class="badge badge-primary badge-pill">{{ $value->Pendadaran->first()->StatusPendadaran->status }}</div>
</td>
@endif --}}

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
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Penguji Pendadaran<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->penguji1->where('statusPendadaran_id', '>=', '2')->where('statusPendadaran_id', '<=', '4')->count() +
                $dosen_id->penguji2->where('statusPendadaran_id', '>=', '2')->where('statusPendadaran_id', '<=', '4')->count() +
                $dosen_id->penguji3->where('statusPendadaran_id', '>=', '2')->where('statusPendadaran_id', '<=', '4')->count() +
                $dosen_id->penguji4->where('statusPendadaran_id', '>=', '2')->where('statusPendadaran_id', '<=', '4')->count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Selesai Ujian Pendadaran<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->penguji1->where('statusPendadaran_id','6')->count() + $dosen_id->penguji2->where('statusPendadaran_id','6')->count() +
                $dosen_id->penguji3->where('statusPendadaran_id','6')->count() + $dosen_id->penguji4->where('statusPendadaran_id','6')->count()}}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-dark card-img-holder text-white card-hover">
            <div class="card-body">
                <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h5 class="font-weight-normal mb-3">Jumlah Mahasiswa Ujian Pendadaran<i class="mdi mdi-checkbox-multiple-marked-outline mdi-24px float-right"></i>
                </h5>
                <h2>{{ $dosen_id->penguji1->count() + $dosen_id->penguji1->count() + $dosen_id->penguji1->count() + $dosen_id->penguji1->count()}}</h2>
            </div>
        </div>
    </div>
</div>

@endsection

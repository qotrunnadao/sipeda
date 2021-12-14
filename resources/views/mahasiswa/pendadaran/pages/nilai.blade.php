@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'trophy')
@section('title', 'nilai pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> No. </th>
                                <th> Komponen Penilaian </th>
                                <th> Nilai Angka </th>
                                <th> Nilai Huruf </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $value)
                            <tr>
                                <td class="text-center"> {{ $loop->iteration }} </td>
                                <td class="text-center"> Nilai Akhir Ujian Pendadaran</td>
                                @if ($value->nilaiAngka == null)
                                <td>
                                    <div class="badge badge-secondary badge-pill">Belum ada data nilai</div>
                                </td>
                                @else
                                <td class="text-center">
                                    <div class="badge badge-secondary badge-pill">{{ $value->nilaiAngka }}</div>
                                </td>
                                @endif
                                <td class="text-center">
                                    <div class="badge badge-secondary badge-pill">{{ $value->nilaiHuruf->nilaiHuruf }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-primary">{{ $value->statusnilai->status }}</span>
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

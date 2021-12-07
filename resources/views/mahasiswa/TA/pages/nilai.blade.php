@extends('mahasiswa.TA.layouts.main')
@section('icon', 'trophy')
@section('title', 'Nilai TA')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="datatable">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Komponen Penilaian</th>
                                <th> Nilai Angka </th>
                                <th> Nilai Huruf </th>
                                <th> Status Nilai </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $value)
                            <tr>
                                <td class="text-center"> {{ $loop->iteration }} </td>
                                <td class="text-center"> Nilai Akhir Tugas Akhir</td>
                                <td class="text-center">
                                    <div class="badge badge-secondary badge-pill">{{ $value->nilaiAngka }}</div>
                                </td>
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

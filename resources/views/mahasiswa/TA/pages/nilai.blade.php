@extends('mahasiswa.TA.layouts.main')
@section('icon', 'trophy')
@section('title', 'Nilai TA')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
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
                            @php ($no = 1)
                            @foreach ($nilai as $value)
                            <tr>
                                <td class="text-center"> {{ $no++}} </td>
                                <td class="text-center"> Nilai Akhir Tugas Akhir</td>
                                <td class="text-center">
                                    <div class="badge badge-secondary badge-pill">{{ $value->nilaiAngka }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-secondary badge-pill">{{ $value->nilaiHuruf }}</div>
                                </td>
                                <td class="text-center">
                                    @if($value->statusnilai_id == 1)
                                    <span class="badge badge-warning">Entry dosen</span>
                                    @elseif($value->statusnilai_id == 2)
                                    <span class="badge badge-success">Upload SIA</span>
                                    @else
                                    <span class="badge badge-primary">Verifikasi Bapendik</span>
                                    @endif
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

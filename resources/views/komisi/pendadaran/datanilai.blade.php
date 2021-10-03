@extends('komisi.layouts.main')
@section('content')
@section('icon', 'trophy')
@section('title', 'Data Nilai Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Jurusan </th>
                                <th> NIM </th>
                                <th> Nilai Angka </th>
                                <th> Nilai Huruf </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> 1 </td>
                                <td class="text-center"> Qotrunnada Oktiriani </td>
                                <td class="text-center"> Informatika</td>
                                <td class="text-center"> H1D018033</td>
                                <td class="text-center">
                                    <div class="badge badge-success badge-pill">85.00</div>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-primary badge-pill">A</div>
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

@extends('komisi.layouts.main')
@section('content')
@section ('icon', 'calendar')
@section('title', 'Jadwal Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Tanggal Yudisium </th>
                                <th> Waktu </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani (H1D018033) </td>
                                <td> H1D018033</td>
                                <td>
                                    20/02/2022
                                </td>
                                <td> 09:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

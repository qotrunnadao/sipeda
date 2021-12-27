@extends('layouts.main')
@section('content')
@section('icon', 'database')
@section('title', 'Data API Sanbox')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('TA.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <h4 class="card-title">Data Dosen</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama </th>
                                <th> NIP </th>
                                <th> Email </th>
                                <th> id pegawai </th>
                                <th> program studi </th>
                                <th> Fakultas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            {{-- @foreach ($dosen_data as $dosen_data) --}}
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $dosen_data["nama"] }}</td>
                                <td> {{ $dosen_data["nip"] }}</td>
                                <td> {{ $dosen_data["email_unsoed"] }}</td>
                                <td> {{ $dosen_data["idpegawai"] }}</td>
                                <td> {{ $dosen_data["namaprogstudi"] }}</td>
                                <td> {{ $dosen_data["namafakultas"] }} </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

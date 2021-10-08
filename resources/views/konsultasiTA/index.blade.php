@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Konsultasi TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            {{-- <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#komisi"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Jumlah Konsultasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($konsultasi as $value )

                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $namaMahasiswa }}</td>
                                <td> {{ $nim }}</td>
                                <td> {{ $namaJurusan }}</td>
                                <td>
                                    {{ $value->count() }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.show', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
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

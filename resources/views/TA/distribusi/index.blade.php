@extends('layouts.main')
@section('content')
@section('icon', 'share-variant')
@section('title', 'Data Distribusi TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan</th>
                                <th class="text-center"> File Distribusi </th>
                                <th class="text-center"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ( $distribusi as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->ta->mahasiswa->nama }}</td>
                                <td class="text-center"> {{ $value->ta->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->ta->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" t arget="blank" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('distribusi.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
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

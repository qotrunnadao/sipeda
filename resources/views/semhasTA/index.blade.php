@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Hasil')
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
                                <th> Jenis Seminar </th>
                                <th> Judul </th>
                                <th> Ruang </th>
                                <th> Tanggal </th>
                                <th> Waktu </th>
                                <th> Status</th>
                                <th> Verifikasi</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semhas as $value )

                            <tr>
                                <td> 1 </td>
                                <td> {{ $value->ta_id }} </td>
                                <td> {{ $value->jenis_id }}</td>
                                <td> {{ $value->ta_id }}</td>
                                <td> {{ $value->ruang_id }} </td>
                                <td> {{ $value->tanggal }}</td>
                                <td> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td>
                                    <div class="badge badge-success badge-pill">{{ $value->status }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-close"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
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

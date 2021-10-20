@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Hasil')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Jurusan </th>
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
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td> {{ $value->ruang->namaRuang }} </td>
                                <td> {{ $value->tanggal }}</td>
                                <td> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td>
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                </td>
                                @elseif($value->status == 1)
                                <span class="badge badge-success">diterima</span></td>
                                @else
                                <span class="badge badge-danger">ditolak</span></td>
                                @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="fa fa-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
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

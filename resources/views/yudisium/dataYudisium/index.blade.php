@extends('layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Pengajuan Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('yudisium.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM</th>
                                <th> Jurusan</th>
                                <th> Transkip Nilai </th>
                                <th> status </th>
                                <th> Verifikasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($yudisium as $value)

                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }}</td>
                                <td> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                <td> {{ $value->transkip }}</td>
                                <td>
                                    @if($value->status_id == 1)
                                    <span class="badge badge-warning">Review Bapendik</span>
                                    @elseif($value->status_id == 2)
                                    <span class="badge badge-success">Disetujui</span>
                                    @elseif($value->status_id == 3)
                                    <span class="badge badge-danger">Tidak disetujui</span>
                                    @elseif($value->status_id == 4)
                                    <span class="badge badge-primary">boleh ajukan lagi</span>
                                    @else
                                    <span class="badge badge-primary">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ulang', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-cached"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.delete', $value->id)}}" method="GET">
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

    {{-- <div class="col-12 grid-margin stretch-card">
        <div class="card">
            @foreach ($yudisium as $value )
            <div class="card-body">
                <div>
                    <a href="{{ route('yudisium.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <h4 class="card-title mb-4">Data Pendaftaran</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td>:</td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                            </tr>
                            <tr>
                                <td> NIM</td>
                                <td>:</td>
                                <td> {{ $value->mahasiswa->nim }} </td>
                            </tr>
                            <tr>
                                <td> Jurusan</td>
                                <td>:</td>
                                <td> {{ $value->mahasiswa->jurusan->namaJurusan }} </td>
                            </tr>
                            <tr>
                                <td> Diajukan Pada </td>
                                <td>:</td>
                                <td> {{ $value->created_at }} </td>
                            </tr>
                            <tr>
                                <td> Transkip Nilai </td>
                                <td>:</td>
                                <td> {{ $value->transkip }} </td>
                            </tr>
                            <tr>
                                <td> Status Yudisium </td>
                                <td>:</td>
                                <td>
                                    @if($value->status_id == 1)
                                    <span class="badge badge-warning">Review Bapendik</span>
                                    @elseif($value->status_id == 2)
                                    <span class="badge badge-success">Disetujui</span>
                                    @elseif($value->status_id == 3)
                                    <span class="badge badge-danger">Tidak disetujui</span>
                                    @elseif($value->status_id == 4)
                                    <span class="badge badge-primary">boleh ajukan lagi</span>
                                    @else
                                    <span class="badge badge-primary">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td> Keterangan</td>
                                <td>:</td>
                                <td> {{ $value->ket }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
</div>
@endsection

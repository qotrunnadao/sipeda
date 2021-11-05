@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Proposal')
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
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semprop as $value )

                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center"> {{ $value->beritaacara }}</td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{-- <div class="btn-group">
                                        <a href="{{ route('semprop.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div> --}}
                                    <div class="btn-group">
                                        <a href="{{ route('semprop.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semprop.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semprop.delete', $value->id) }}" method="GET">
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

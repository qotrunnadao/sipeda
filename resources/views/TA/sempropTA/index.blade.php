@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Proposal')

@if(auth()->user()->level_id == 2)
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('semprop.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <h4 class="card-title">Pengajuan Seminar Proposal</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semprop_all as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>

                                <td> {{ $value->TA->mahasiswa->nim }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        {{-- <form action="{{ route('semprop.download', $value->beritaacara) }}" target="blank" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form> --}}
                                        <a href="{{ route('semprop.berkas') }}" type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                    </div>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($value->status != 0)
                                    @if ( $value->beritaacara == null)
                                    <div class="btn-group">
                                        <form action="{{ route('semprop.eksport', $value->id) }}" method="GET" id="export">
                                            <button type="submit" id="btnSubmit" class="btn btn-gradient-primary btn-sm eksport"><i class="mdi mdi-check"></i></button>
                                        </form>
                                    </div>
                                    @endif

                                    <div class="btn-group">
                                        <form action="{{ route('semprop.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>

                                    @else
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
@elseif(auth()->user()->level_id == 3 || 1 || 5)
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengajuan Seminar Proposal</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semprop_dosen as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>

                                <td class="text-center"> {{ $value->TA->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        {{-- <form action="{{ route('semprop.download', $value->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form> --}}
                                        <a href="{{ route('semprop.berkas') }}" type="button" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                    </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($value->status != 0)
                                    <div class="btn-group">
                                        <a href="{{ route('semprop.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semprop.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @else
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
    @if(auth()->user()->level_id == 1 || 5)
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Seminar Proposal Jurusan</h4>
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
                                <th class="text-center"> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semprop_jurusan as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
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
    @endif
</div>
@endif
<script>
    $(document).ready(function () {

    $("#export").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection

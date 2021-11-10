@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Hasil')
@if(auth()->user()->level_id == 2)
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengajuan Seminar Hasil</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> NIM </th>
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
                            @foreach ($semhas_all as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
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
                                        <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
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
                                    @if ($value->status != 0)
                                    @if ( $value->beritaacara == null)
                                    <a href="{{ route('semhas.eksport', $value->ta_id) }}">
                                        <button type="submit" class="btn btn-gradient-primary btn-sm eksport"><i class="mdi mdi-check"></i></button>
                                    </a>
                                    @endif

                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>

                                    @else
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
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
                <h4 class="card-title">Pengajuan Seminar Hasil</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> NIM </th>
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
                            @foreach ($semhas_dosen as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
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
                                    @if ($value->status != 0)
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
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
                <h4 class="card-title">Data Seminar Hasil Jurusan</h4>
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
                            @foreach ($semhas_jurusan as $value )
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
@endsection

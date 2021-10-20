@extends('admin.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Pengajuan Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('pendadaran.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <div class="card-title mb-5">Pengajuan Pendadaran</div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($pendadaran as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }} </td>
                                <td> {{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $value->statuspendadaran->status }}</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('pendadaran.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.delete', $value->id)}}" method="GET">
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
            @foreach ($pendadaran as $value )
            <div class="card-body">
                <div>
                    <a href="{{ route('pendadaran.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                <h4 class="card-title my-4">Data Pengajuan</h4>
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
                                <td> {{ $value->tanggal }} </td>
                            </tr>
                            <tr>
                                <td> Transkip Nilai </td>
                                <td>:</td>
                                <td> {{ $value->transkip }} </td>
                            </tr>
                            <tr>
                                <td> Hasil UEPT </td>
                                <td>:</td>
                                <td> {{ $value->hasiluept }} </td>
                            </tr>
                            <tr>
                                <td> Form Distribusi TA </td>
                                <td>:</td>
                                <td> {{ $value->buktidistribusi }} </td>
                            </tr>
                            <tr>
                                <td> Status Pendaftaran </td>
                                <td>:</td>
                                <td>
                                    <span class="badge badge-primary">{{ $value->statuspendadaran->status }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
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

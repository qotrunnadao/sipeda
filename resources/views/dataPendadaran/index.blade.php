@extends('admin.layouts.main')
@section('content')
@section('icon', 'account-multiple')
@section('title', 'Data Mahasiswa Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-5">Pengajuan Pendadaran</div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> status </th>
                                <th> verifikasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($pendadaran as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $namaMahasiswa }}</td>
                                <td> {{ $nim }} </td>
                                <td> {{ $namaJurusan }} </td>
                                <td>
                                    <div class="badge badge-danger badge-pill">{{ $ketStatus }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#detail"><i class="mdi mdi-information"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-warning btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
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

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal Pendadaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td> <b>Nama</b> </td>
                                <td>:</td>
                                <td> {{ $namaMahasiswa }} </td>
                            </tr>
                            <tr>
                                <td> <b>NIM</b> </td>
                                <td>:</td>
                                <td> {{ $nim }} </td>
                            </tr>
                            <tr>
                                <td> <b>Transkip Nilai</b> </td>
                                <td>:</td>
                                <td> {{ $value->transkip }} </td>
                            </tr>
                            <tr>
                                <td> <b>Hasil UEPT</b> </td>
                                <td>:</td>
                                <td> {{ $value->hasiluept }} </td>
                            </tr>
                            <tr>
                                <td> <b>Tanggal Pendadaran </b></td>
                                <td>:</td>
                                <td> {{ $value->tanggal }} </td>
                            </tr>
                            <tr>
                                <td> <b>Waktu</b> </td>
                                <td>:</td>
                                <td> {{ $value->waktu }} </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 1</b></td>
                                <td>:</td>
                                <td> {{ $namaPenguji1 }} </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 2</b></td>
                                <td>:</td>
                                <td> {{ $namaPenguji2 }} </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 3</b></td>
                                <td>:</td>
                                <td> {{ $namaPenguji3 }} </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 4</b></td>
                                <td>:</td>
                                <td> {{ $namaPenguji4 }} </td>
                            </tr>
                            <tr>
                                <td> <b>Status</b></td>
                                <td>:</td>
                                <td>
                                    <div class="badge badge-danger badge-pill">{{ $ketStatus }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

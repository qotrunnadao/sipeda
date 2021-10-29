@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Dosen')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> ID </th>
                                <th> Nama </th>
                                <th> Alamat </th>
                                <th> Foto </th>
                                <th> No.HP </th>
                                <th> Tgl Lahir</th>
                                <th> Tempat Lahir</th>
                                <th> Agama </th>
                                <th> Jenis Kelamin </th>
                                <th> Jurusan</th>
                                <th> is Komisi</th>
                                <th> id user </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($dosen as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> <span class="badge badge-secondary">{{ $value->id }}</span></td>
                                <td> {{ $value->nama }}</td>
                                <td> {{ $value->alamat }}</td>
                                <td> {{ $value->foto }}</td>
                                <td> {{ $value->nohp }}</td>
                                <td> {{ $value->tglLahir }}</td>
                                <td> {{ $value->tmptLahir }}</td>
                                <td> {{ $value->agama->namaAgama }}</td>
                                <td> {{ $value->jk_id }} </td>
                                <td> {{ $value->jurusan_id }}</td>
                                <td> {{ $value->isKomisi }}</td>
                                <td> {{ $value->user_id }} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Komisi -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Jurusan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">NIP</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

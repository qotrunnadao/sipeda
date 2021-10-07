@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Konsultasi TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            {{-- <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#komisi"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa</th>
                                <th> Dosen Pembimbing</th>
                                <th> </th>
                                <th> Praproposal </th>
                                <th> Tanggal Daftar</th>
                                <th> Tanggal SPK</th>
                                <th> Tanggal Ambil </th>
                                <th> Pembimbing 1 </th>
                                <th> Pembimbing 2</th>
                                <th> Nilai </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($tugas_akhir as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $value->mahasiswa->nama }}</td>
                                <td> {{ $value->judulTA }} </td>
                                <td> {{ $value->instansi }}</td>
                                <td> {{ $value->praproposal }}</td>
                                <td> {{ $value->tglDaftar }}</td>
                                <td> {{ $value->tglSPK }}</td>
                                <td> {{ $value->tglAmbil }}</td>
                                <td> {{ $value->pembimbing1_id }}</td>
                                <td> {{ $value->pembimbing2_id }}</td>
                                <td> {{ $value->nilai }}</td>
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
<div class="modal fade" id="komisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Komisi</h5>
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

@extends('pendadaran.layouts.main')
@section('content')
@section('icon', 'folder-upload')
@section('title', 'upload surat tugas')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#uploadSK"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th> NIM </th>
                                <th> Jurusan </th>
                                <th> Surat Tugas </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani </td>
                                <td> H1D018033 </td>
                                <td> Informatika</td>
                                <td>
                                    Surat Tugas-H1D018033
                                </td>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah SK -->
<div class="modal fade" id="uploadSK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Surat Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Jurusan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">NIM</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Upload Surat</label>
                        <div class="input-group">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

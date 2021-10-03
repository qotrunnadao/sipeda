@extends('dosen.layouts.main')
@section('content')
@section('icon', 'folder-upload')
@section('title', 'Nilai Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#uploadnilai"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Nilai Angka </th>
                                <th> Nilai Huruf </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> 1 </td>
                                <td class="text-center"> Qotrunnada Oktiriani </td>
                                <td class="text-center"> H1D018033</td>
                                <td class="text-center"> 85.00</td>
                                <td class="text-center"> A</td>
                                <td class="text-center">
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

<div class="modal fade" id="uploadnilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Nilai Pendadaran</h5>
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
                        <label for="exampleInputEmail3">NIM</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Angka</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Huruf</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
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

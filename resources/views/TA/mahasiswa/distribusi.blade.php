@extends('TA.layouts.main')
@section('title', 'Distribusi TA')
@section('icon', 'share-variant')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Upload berkas distribusi</h4>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">File Distribusi</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data berkas distribusi</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Dokumen </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"> 1 </td>
                                <td> Distribusi dokumen TA - H1D018033 </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-download"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete-forever"></i></button>
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
@endsection

@extends('pendadaran.layouts.main')
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
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033 </td>
                                <td> Informatika </td>
                                <td>
                                    <div class="badge badge-danger badge-pill">menunggu persetujuan</div>
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
                                        <a href="<?= url('') ?>/pendadaran/komisi/detailmahasiswa" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
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
@endsection

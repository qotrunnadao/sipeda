@extends('admin.layouts.main')
@section('content')
@section('icon', 'comment-text')
@section('title', 'Pengajuan Seminar')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Jenis Seminar </th>
                                <th> Judul </th>
                                <th> Ruang </th>
                                <th> Tanggal </th>
                                <th> Waktu </th>
                                <th> Status</th>
                                <th> Verifikasi</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani (H1D018033) </td>
                                <td> Seminar Proposal</td>
                                <td> SIPETA</td>
                                <td> Seminar 1 </td>
                                <td> 26/10/2021</td>
                                <td> 09:00 - 10:00 </td>
                                <td>
                                    <div class="badge badge-success badge-pill">disetujui</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-close"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
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

@extends('yudisium.layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Pengajuan Yudisium')
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
                                <th> Jurusan</th>
                                <th> status </th>
                                <th> Transkip Nilai </th>
                                <th> Nilai UEPT </th>
                                <th> Verifikasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani (H1D018033) </td>
                                <td> Informatika</td>
                                <td>
                                    <div class="badge badge-danger badge-pill">menunggu persetujuan</div>
                                </td>
                                <td>
                                    <i class="mdi mdi-file"></i> PraProposal-Qotrunnada
                                </td>
                                <td>
                                    <i class="mdi mdi-file"></i> PraProposal-Qotrunnada
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
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-delete"></i></button>
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

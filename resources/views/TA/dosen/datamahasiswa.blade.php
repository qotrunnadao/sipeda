@extends('TA.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Mahasiswa TA')
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
                                <th> NIM </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033</td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Pelaksanaan</div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#detail"><i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Data Mahasiswa -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td>:</td>
                                <td> Qotrunnada Oktiriani </td>
                            </tr>
                            <tr>
                                <td> Judul Penelitian </td>
                                <td>:</td>
                                <td> Sistem Pengelolaan Studi Akhir </td>
                            </tr>
                            <tr>
                                <td> Lokasi / Instansi</td>
                                <td>:</td>
                                <td> Fakultas Teknik </td>
                            </tr>
                            <tr>
                                <td> Dosen Pembimbing 1</td>
                                <td>:</td>
                                <td> Swahesti Puspita Rahayu </td>
                            </tr>
                            <tr>
                                <td> Dosen Pembimbing 2</td>
                                <td>:</td>
                                <td> Bangun Wijayanto </td>
                            </tr>
                            <tr>
                                <td> File Pra Proposal</td>
                                <td>:</td>
                                <td> Praproposal - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Status Pelaksanaan </td>
                                <td>:</td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Pelaksanaan</div>
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

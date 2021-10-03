@extends('pendadaran.layouts.main')
@section('content')
@section('icon', 'calendar')
@section('title', 'Jadwal Pendadaran')
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
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani</td>
                                <td> H1D018033</td>
                                <td>
                                    <a href="#" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#detailJadwal"><i class="mdi mdi-information"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Jadwal Pendadaran -->
<div class="modal fade" id="detailJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <td> Qotrunnada Oktiriani </td>
                            </tr>
                            <tr>
                                <td> <b>Tanggal Pendadaran </b></td>
                                <td>:</td>
                                <td> 26 Oktober 2021 </td>
                            </tr>
                            <tr>
                                <td> <b>Waktu</b> </td>
                                <td>:</td>
                                <td> 09:00</td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 1</b></td>
                                <td>:</td>
                                <td> Swahesti Puspita Rahayu </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 2</b></td>
                                <td>:</td>
                                <td> Bangun Wijayanto </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 3</b></td>
                                <td>:</td>
                                <td> Bangun Wijayanto </td>
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 4</b></td>
                                <td>:</td>
                                <td> Bangun Wijayanto </td>
                            </tr>
                            <tr>
                                <td> <b>Status</b></td>
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

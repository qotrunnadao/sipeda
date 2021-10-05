@extends('mahasiswa.TA.layouts.main')
@section('icon', 'account-multiple')
@section('title', 'Konsultasi TA')
@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#exampleModal"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Tanggal Konsul </th>
                                <th> Nama Pembimbing </th>
                                <th> Terverivikasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> 10/11/2021 </td>
                                <td> Lasmedi Afuan (Pembimbing 1)</td>
                                <td>
                                    <div class="badge badge-primary badge-pill">True</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-warning btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete-forever"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 1 </td>
                                <td> 17/11/2021 </td>
                                <td> Ipung Permadi (Pembimbing 2)</td>
                                <td>
                                    <div class="badge badge-danger badge-pill">false</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-warning btn-sm"><i class="mdi mdi-border-color"></i></a>
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

<!-- Modal Tembah Data Konsultasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleSelectGender">Nama Pembimbing</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Lasmedi Afuan</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Konsultasi</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alasan">Hasil Konsultasi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
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

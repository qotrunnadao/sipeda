@extends('mahasiswa.TA.layouts.main')
@section('icon', 'comment-text')
@section('title', 'Seminar Hasil')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Pengajuan Seminar</h4>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">Judul Penelitian</label>
                    </div>
                    <div class="col-lg-8">
                        <input class="form-control" maxlength="25" name="judul" id="judul" type="text" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">Jenis Seminar</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="AL" data-select2-id="3">Seminar proposal</option>
                            <option value="WY" data-select2-id="17">seminar Hasil</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">Tanggal Seminar</label>
                    </div>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">Ruang Seminar</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="AL" data-select2-id="3">Ruang Seminar 1</option>
                            <option value="WY" data-select2-id="17">Ruang Seminar 2</option>
                            <option value="AM" data-select2-id="18">Ruang Seminar 3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="col-form-label">waktu</label>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" placeholder="mulai">
                            <span class="input-group-text">
                                <i class="mdi mdi-clock"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" placeholder="selesai">
                            <span class="input-group-text">
                                <i class="mdi mdi-clock"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">
                        File Proposal
                    </label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control" />
                    </div>
                </div>
                <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data Pengajuan Seminar</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th> # </th>
                                <th> Judul Penelitian </th>
                                <th> Jenis </th>
                                <th> Tanggal </th>
                                <th> Ruang </th>
                                <th> Waktu </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td> 1 </td>
                                <td> SIPETA </td>
                                <td> Seminar Proposal</td>
                                <td> 26/10/2021</td>
                                <td> Seminar 1 </td>
                                <td> 09:00 - 11:00 </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">True</div>
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

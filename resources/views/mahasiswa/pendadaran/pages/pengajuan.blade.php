@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'pendaftaran pendadarn')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Transkip nilai
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Skripsi
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Form Distribusi TA
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Scan KTM
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Pengajuan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td>:</td>
                                <td> Qotrunnada Oktiriani </td>
                            </tr>
                            <tr>
                                <td> Diajukan Pada </td>
                                <td>:</td>
                                <td> 20/02/2022 </td>
                            </tr>
                            <tr>
                                <td> Transkip Nilai </td>
                                <td>:</td>
                                <td> transkip nilai - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Skripsi </td>
                                <td>:</td>
                                <td> Skripsi - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Form Distribusi TA </td>
                                <td>:</td>
                                <td> Form Distribusi - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Scan KTM </td>
                                <td>:</td>
                                <td> KTM - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Status Pendaftaran </td>
                                <td>:</td>
                                <td>
                                    <div class="badge badge-success badge-pill">menunggu persetujuan</div>
                                </td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
                                <td> : </td>
                                <td> - </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('yudisium.layouts.main')
@section('title', 'Pendaftaran Yudisium')
@section('icon', 'file')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required autofocus />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Transkip Nilai
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Hasil Ujian UEPT
                        </label>
                        <div class="col-sm-10">
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
                <h4 class="card-title mb-4">Data Pendaftaran</h4>
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
                                <td> Transkip Nilai - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Hasil Ujian UEPT </td>
                                <td>:</td>
                                <td> Nilai UEPT - H1D018033 </td>
                            </tr>
                            <tr>
                                <td> Status Pendaftaran </td>
                                <td>:</td>
                                <td>
                                    <div class="badge badge-success badge-pill">Disetujui</div>
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

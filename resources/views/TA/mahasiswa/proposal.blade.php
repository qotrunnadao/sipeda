@extends('TA.layouts.main')
@section('icon', 'file')
@section('title', 'Pengajuan TA')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Judul Penelitian
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Lokasi/Instansi
                        </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Pembimbing 1
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm">
                                <option>
                                    Option 1
                                </option>
                                <option>
                                    Option 2
                                </option>
                                <option>
                                    Option 3
                                </option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label">
                            Pembimbing 2
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm">
                                <option>
                                    Option 1
                                </option>
                                <option>
                                    Option 2
                                </option>
                                <option>
                                    Option 3
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            File Pra Proposal
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
                <h4 class="card-title mb-4">Data Pengajuan TA</h4>
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
                                    <div class="badge badge-danger badge-pill">review bapendik</div>
                                </td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
                                <td>:</td>
                                <td>
                                    -
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

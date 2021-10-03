@extends('TA.layouts.main')
@section('content')
@section('icon', 'account-multiple')
@section('title', 'Detail TA Mahasiswa')
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
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Status
                        </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-10">
                            <input type="textarea" class="form-control" required />
                        </div>
                    </div>
                    <a href="" type="button" class="btn btn-gradient-primary">Edit</a>
                    <a href="<?= url('') ?>/TA/komisi/datamahasiswa" type="button" class="btn btn-gradient-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.main')
@section('content')
@section('icon', 'account-multiple')
@section('title', 'Detail Mahasiswa Pendadaran')
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
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Transkip nilai
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="transkip nilai" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            ujian UEPT
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="Hasil Ujian UEPT" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Form Distribusi TA
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="form distribusi TA" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Waktu Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 1
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 2
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 3
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 4
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required autofocus placeholder="Nama Mahasiswa" />
                        </div>
                    </div>
                    <a href="<?= url('') ?>/pendadaran/admin/datamahasiswa" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Detail Pengajuan TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Nama Mahasiswa
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->mahasiswa->nama }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Judul Penelitian
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->judulTA }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Lokasi/Instansi
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->instansi }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        File Pra Proposal
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->praproposal }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Pembimbing 1
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->dosen->nama }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Pembimbing2
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->dosen->nama }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Tanggal Daftar
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->created_at }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Tanggal SPK
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->tglSPK }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Tanggal Ambil
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->tglAmbil }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">
                        Status
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $data_TA->status->ket }}" />
                    </div>
                </div>
                <a href="{{ route('TA.index') }}" type="button" class="btn btn-gradient-danger"> Kembali</a>
                <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>

        </div>
    </div>
</div>

@endsection

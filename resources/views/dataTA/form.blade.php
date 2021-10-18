@extends('admin.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Tugas Akhir')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')/{{ $data_TA->id}}@endif" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}@endif
                <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value="">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Judul Tugas Akhir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Judul Tugas Akhir" name="judulTA" value="@if ($button == 'Tambah'){{ old('judulTA') }}@else{{ $data_TA->judulTA }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Instansi / Lokasi Penelitian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Instansi / Lokasi Penelitian" name="instansi" value="@if ($button == 'Tambah'){{ old('instansi') }}@else{{ $data_TA->instansi }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Praporosal
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="file praproposal" name="praproposal" value="@if ($button == 'Tambah'){{ old('praproposal') }}@else{{ $data_TA->praproposal }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 1
                        </label>
                        <div class="col-sm-9">
                            <select name="pembimbing1_id" id="pembimbing1_id" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaDosen1') }}@else{{ $namaDosen1 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 2
                        </label>
                        <div class="col-sm-9">
                            <select name="pembimbing2_id" id="pembimbing2_id" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaDosen2') }}@else{{ $namaDosen2 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status Pelaksanaan
                        </label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($status as $value )
                                <option value="@if ($button == 'Tambah'){{ old('ketStatus') }}@else{{ $ketStatus }}@endif">{{ $value->ket}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="-" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_pendadaran->ket }}@endif</textarea>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/tugas-akhir/data-TA" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

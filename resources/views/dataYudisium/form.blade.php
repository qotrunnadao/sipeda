@extends('admin.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')/{{ $data_yudisium->id}}@endif" method="post">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}@endif
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="namaMahasiswa" value="@if ($button == 'Tambah'){{ old('namaMahasiswa') }}@else{{ $data_yudisium->mahasiswa->nama }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="@if ($button == 'Tambah'){{ old('nim') }}@else{{ $data_yudisium->mahasiswa->nim }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="@if ($button == 'Tambah'){{ old('namaJurusan') }}@else{{ $data_yudisium->mahasiswa->jurusan->namaJurusan }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Transkip nilai
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="transkip nilai" name="transkip" value="@if ($button == 'Tambah'){{ old('transkip') }}@else{{ $data_yudisium->transkip }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Yudisium
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Yudisium" name="tanggal" value="@if ($button == 'Tambah'){{ old('tanggal') }}@else{{ $data_yudisium->tanggal }}@endif" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Waktu Yudisium
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="Waktu Yudisium" name="tanggal" value="@if ($button == 'Tambah'){{ old('waktu') }}@else{{ $data_yudisium->waktu }}@endif">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status
                        </label>
                        <div class="col-sm-9">
                            <select name="statusyudisium_id" id="statusyudisium" class="form-control">
                                @foreach ($status as $value )
                                <option value="@if ($button == 'Tambah'){{ old('ketStatus') }}@else{{ $ketStatus }}@endif">{{ $value->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="-" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_yudisium->ket }}@endif</textarea>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/yudisium/data-yudisium" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

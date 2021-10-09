@extends('admin.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')/{{ $data_pendadaran->id}}@endif" method="post">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}@endif
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="namaMahasiswa" value="@if ($button == 'Tambah'){{ old('namaMahasiswa') }}@else{{ $namaMahasiswa }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="@if ($button == 'Tambah'){{ old('nim') }}@else{{ $nim }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="@if ($button == 'Tambah'){{ old('namaJurusan') }}@else{{ $namaJurusan }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Transkip nilai
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="transkip nilai" name="transkip" value="@if ($button == 'Tambah'){{ old('transkip') }}@else{{ $data_pendadaran->transkip }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            ujian UEPT
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="Hasil Ujian UEPT" name="hasiluept" value="@if ($button == 'Tambah'){{ old('hasiluept') }}@else{{ $data_pendadaran->hasiluept }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Bukti Distribusi TA
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="form distribusi TA" name="buktidistribusi" value="@if ($button == 'Tambah'){{ old('buktidistribusi') }}@else{{ $data_pendadaran->buktidistribusi }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" name="tanggal" value="@if ($button == 'Tambah'){{ old('tanggal') }}@else{{ $data_pendadaran->tanggal }}@endif" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Waktu Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" placeholder="Waktu Pendadaran" name="tanggal" value="@if ($button == 'Tambah'){{ old('waktu') }}@else{{ $data_pendadaran->waktu }}@endif">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 1
                        </label>
                        <div class="col-sm-9">
                            <select name="namaPenguji1" id="namaPenguji1" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaPenguji1') }}@else{{ $namaPenguji1 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 2
                        </label>
                        <div class="col-sm-9">
                            <select name="namaPenguji2" id="namaPenguji2" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaPenguji2') }}@else{{ $namaPenguji2 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 3
                        </label>
                        <div class="col-sm-9">
                            <select name="namaPenguji3" id="namaPenguji3" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaPenguji3') }}@else{{ $namaPenguji3 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 4
                        </label>
                        <div class="col-sm-9">
                            <select name="namaPenguji4" id="namaPenguji4" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('namaPenguji4') }}@else{{ $namaPenguji4 }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status
                        </label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                <option value="">PILIH</option>
                                <option value="0" {{ $data_pendadaran->status == 0 ? 'selected' : '' }}>Menunggu</option>
                                <option value="1" {{ $data_pendadaran->status == 1 ? 'selected' : '' }}>Diterima</option>
                                <option value="2" {{ $data_pendadaran->status == 2 ? 'selected' : '' }}>Ditolak</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="-">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_pendadaran->ket }}@endif</textarea>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/pendadaran/data-pendadaran" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

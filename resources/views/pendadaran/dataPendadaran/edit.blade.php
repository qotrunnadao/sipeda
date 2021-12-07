@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Edit Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{route('pendadaran.update')}}" enctype="multipart/form-data" id="eksport" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama Mahasiswa
                        </label>
                        <div class="col-sm-9">
                            <input readonly type="text" class="form-control" required placeholder="Nama Mahasiswa" id="name" name="name" value="{{ $data_pendadaran->mahasiswa->nama }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Ujian Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" value="@if ($button == 'Tambah'){{ old('tanggal') }}@else{{ $data_pendadaran->tanggal }}@endif" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Waktu Ujian Pendadaran</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamMulai" placeholder="mulai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamSelesai" placeholder="selesai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Ruang Seminar</label>
                        </div>
                        <div class="col-lg-8">
                            <select class="form-control" id="ruang" name="ruang" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($ruang as $value)
                                <option value="{{ $value->id }} ">{{ $value->namaRuang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 1
                        </label>
                        <div class="col-sm-9">
                            <select name="penguji1_id" id="penguji1_id" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('penguji1_id') }}@else{{ $data_pendadaran->penguji1->nama }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 2
                        </label>
                        <div class="col-sm-9">
                            <select name="penguji2_id" id="penguji2_id" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('penguji2_id') }}@else{{ $data_pendadaran->penguji2->nama }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 3
                        </label>
                        <div class="col-sm-9">
                            <select name="penguji3_id" id="penguji3_id" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('penguji3_id') }}@else{{ $data_pendadaran->penguji3->nama }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Penguji 4
                        </label>
                        <div class="col-sm-9">
                            <select name="penguji4_id" id="penguji4_id" class="form-control">
                                @foreach ($dosen as $value )
                                <option value="@if ($button == 'Tambah'){{ old('penguji4_id') }}@else{{ $data_pendadaran->penguji4->nama }}@endif">{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status
                        </label>
                        <div class="col-sm-9">
                            <select name="statuspendadaran_id" id="status" class="form-control">
                                @foreach ($status as $value )
                                <option value="@if ($button == 'Tambah'){{ old('status') }}@else{{ $data_pendadaran->statuspendadaran->status }}@endif">{{ $value->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_pendadaran->ket }}@endif</textarea>
                            <p class="text-muted"> * tidak wajib di isi</p>
                        </div>
                    </div>
                    @if (auth()->user()->level_id == 2)
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Ujian Pendadaran
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="berita acara Ujian Pendadaran" name="beritaacara" value="{{ $data_pendadaran->beritaacara }}" />
                        </div>
                    </div>
                    @endif
                    <a href="<?= url('') ?>/pendadaran/data-pendadaran" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
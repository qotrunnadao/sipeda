@extends('layouts.main')
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
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="namaMahasiswa" value="@if ($button == 'Tambah'){{ old('namaMahasiswa') }}@else{{ $data_pendadaran->mahasiswa->nama }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="@if ($button == 'Tambah'){{ old('nim') }}@else{{ $data_pendadaran->mahasiswa->nim }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="@if ($button == 'Tambah'){{ old('namaJurusan') }}@else{{ $data_pendadaran->mahasiswa->jurusan->namaJurusan }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Transkip nilai
                        </label>
                        <div class="col-sm-9">
                            @if($data_pendadaran->transkip != null)
                            <div class="btn-group">
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $data_pendadaran->transkip }} <i class="mdi mdi-download"></i></a></button>
                                </form>
                            </div>
                            @else
                            <input type="file" class="form-control" placeholder="transkip nilai" name="transkip" value="@if ($button == 'Tambah'){{ old('transkip') }}@else{{ $data_pendadaran->transkip }}@endif" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            ujian UEPT
                        </label>
                        <div class="col-sm-9">
                            @if($data_pendadaran->hasiluept != null)
                            <div class="btn-group">
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $data_pendadaran->hasiluept }} <i class="mdi mdi-download"></i></a></button>
                                </form>
                            </div>
                            @else
                            <input type="file" class="form-control" placeholder="Hasil Ujian UEPT" name="hasiluept" value="@if ($button == 'Tambah'){{ old('hasiluept') }}@else{{ $data_pendadaran->hasiluept }}@endif" />
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Bukti Distribusi TA
                        </label>
                        <div class="col-sm-9">
                            @if($data_pendadaran->buktidistribusi != null)
                            <div class="btn-group">
                                <form action="" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $data_pendadaran->buktidistribusi }} <i class="mdi mdi-download"></i></a></button>
                                </form>
                            </div>
                            @else
                            <input type="file" class="form-control" placeholder="form distribusi TA" name="buktidistribusi" value="@if ($button == 'Tambah'){{ old('buktidistribusi') }}@else{{ $data_pendadaran->buktidistribusi }}@endif" />
                            @endif
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
                            <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_pendadaran->ket }}@endif</textarea>
                            <p class="text-muted"> * tidak wajib di isi</p>
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

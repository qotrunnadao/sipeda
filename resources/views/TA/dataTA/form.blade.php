@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Tugas Akhir')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}" method="post" enctype="multipart/form-data">
                {{-- {{ dd($mhs) }} --}}
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PATCH') }}@endif
                {{-- <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value=""> --}}
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Mahasiswa
                        </label>
                        <div class="col-sm-9">
                            <select name="mahasiswa" id="mahasiswa" class="form-control">
                                <option selected disabled>PILIH MAHASISWA</option>
                                @foreach ($mhs as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->mahasiswa_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Judul Tugas Akhir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Judul Tugas Akhir" name="judulTA" value="@if ($button == 'Tambah'){{ old('judulTA') }}@else{{ $data_ta->judulTA }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Instansi / Lokasi Penelitian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Instansi / Lokasi Penelitian" name="instansi" value="@if ($button == 'Tambah'){{ old('instansi') }}@else{{ $data_ta->instansi }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Praporosal
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="file praproposal" name="praproposal" value="@if ($button == 'Tambah'){{ old('praproposal') }}@else{{ $data_ta->praproposal }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 1
                        </label>
                        <div class="col-sm-9">
                            {{-- <input type="hidden" name="pembimbing1_id" id="pembimbing1_id" /> --}}
                            <select name="pembimbing1_id" id="pembimbing1_id" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($dosen as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->pembimbing1_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 2
                        </label>
                        <div class="col-sm-9">
                            {{-- <input type="hidden" name="pembimbing2_id" id="pembimbing2_id" /> --}}
                            <select name="pembimbing2_id" id="pembimbing2_id" class="form-control">
                                <option value="">PILIH </option>
                                @foreach ($dosen as $value )
                                <option value="{{ $value->id }}"{{ $value->id == $data_ta->pembimbing2_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tahun Akademik
                        </label>
                        <div class="col-sm-9">
                            {{-- <input type="hidden" name="pembimbing1_id" id="pembimbing1_id" /> --}}
                            {{-- {{ dd($tahunAkademik->first()->namaTahun) }} --}}
                            <select name="tahunAkademik" id="tahunAkademik" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($tahunAkademik as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->thnAkad_id ? 'selected' : '' }}>{{ $value->namaTahun }} ({{ $value->semester->semester }})</option>
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
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->status_id ? 'selected' : '' }}>{{ $value->ket}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_ta->ket }}@endif</textarea>
                            <p class="text-muted"> * tidak wajib di isi</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</button>
                    <a href="<?= url('') ?>/tugas-akhir/data-TA" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

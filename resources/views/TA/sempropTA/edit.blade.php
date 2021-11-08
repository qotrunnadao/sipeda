@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Detail Seminar Proposal')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semprop.update', $semprop->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <input type="hidden" class="form-control" id="mahasiswa_id" name="ta_id" value="{{ $semprop->ta_id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="nama" value="{{ $semprop->TA->mahasiswa->nama }}" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="{{ $semprop->TA->mahasiswa->nim }}" readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="{{ $semprop->TA->mahasiswa->jurusan->namaJurusan }}" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">waktu</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamMulai" placeholder="mulai" value="{{ $semprop->jamMulai }}" readonly>
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamSelesai" placeholder="selesai" value="{{ $semprop->jamSelesai }}" readonly>
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Seminar
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" name="tanggal" value="{{ $semprop->tanggal }}" readonly/>
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Ruang Seminar
                        </label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="mahasiswa_id" name="ruang_id" value="{{ $semprop->ruang_id }}">
                            <input type="text" class="form-control" placeholder="ruang seminar proposal" name="namaRuang" value="{{ $semprop->ruang->namaRuang }}"readonly />
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Bapendik
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara" value="{{ $semprop->beritaacara }}" />
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Dosen
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara_dosen" value="{{ $semprop->beritaacara_dosen }}" />
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status Pengajuan
                        </label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ $semprop->status == 0 ? 'selected' : '' }}>Menunggu</option>
                                <option value="1" {{ $semprop->status == 1 ? 'selected' : '' }}>Disetujui</option>
                                <option value="2" {{ $semprop->status == 2 ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div> --}}
                    <a href="{{ route('semprop.index') }}" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

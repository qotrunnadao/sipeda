@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Ubah Seminar Proposal')
<div class="row">
    {{-- <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semprop.update', $semprop->id) }}" id="editData" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <input type="hidden" class="form-control" id="mahasiswa_id" name="ta_id" value="{{ $semprop->ta_id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="nama" value="{{ $semprop->TA->mahasiswa->nama }}" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="{{ $semprop->TA->mahasiswa->nim }}" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-8">
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
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" name="tanggal" value="{{ $semprop->tanggal }}" readonly />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Ruang Seminar
                        </label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="mahasiswa_id" name="ruang_id" value="{{ $semprop->ruang_id }}">
                            <input type="text" class="form-control" placeholder="ruang seminar proposal" name="namaRuang" value="{{ $semprop->ruang->namaRuang }}" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Dosen
                        </label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara" value="{{ $semprop->beritaacara }}" />
                        </div>
                    </div>
                    <a href="{{ route('semprop.index') }}" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semprop.update', $semprop->id) }}" id="editData" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <input type="hidden" class="form-control" id="mahasiswa_id" name="ta_id" value="{{ $semprop->ta_id }}">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Nama Mahasiswa
                                </label>
                                <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="nama" value="{{ $semprop->TA->mahasiswa->nama }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    NIM
                                </label>
                                <input type="text" class="form-control" required placeholder="NIM" name="nim" value="{{ $semprop->TA->mahasiswa->nim }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    Jurusan
                                </label>
                                <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="{{ $semprop->TA->mahasiswa->jurusan->namaJurusan }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>Judul Penelitian</label>
                                <input class="form-control" name="judul" id="judul" type="text" value="{{ $semprop->TA->judulTA }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Berkas Persyaratan
                                </label>
                                <input type="file" class="form-control" name="proposal" value="{{ $semprop->proposal }}" />
                                @if ($errors->has('proposal'))
                                <div class="text-danger">
                                    {{ $errors->first('proposal') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>waktu Mulai</label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamMulai" placeholder="mulai" value="{{ $semprop->jamMulai }}" readonly>
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>waktu Selesai</label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamSelesai" placeholder="selesai" value="{{ $semprop->jamSelesai }}" readonly>
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>
                                        Tanggal Seminar
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" name="tanggal" value="{{ $semprop->tanggal }}" readonly />
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Ruang Seminar</label>
                                    <input type="hidden" class="form-control" id="mahasiswa_id" name="ruang_id" value="{{ $semprop->ruang_id }}">
                                    <input type="text" class="form-control" placeholder="ruang seminar proposal" name="namaRuang" value="{{ $semprop->ruang->namaRuang }}" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Berita Acara Dosen
                                </label>
                                <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara" value="{{ $semprop->beritaacara }}" />
                                @if ($errors->has('beritaacara'))
                                <div class="text-danger">
                                    {{ $errors->first('beritaacara') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('semprop.index') }}" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    $("#editData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection

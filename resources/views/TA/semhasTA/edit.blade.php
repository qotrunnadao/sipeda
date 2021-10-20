@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Detail Seminar Hasil')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semhas.update', $semhas->id) }}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" name="namaMahasiswa" value="{{ $semhas->TA->mahasiswa->nama }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            NIM
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="NIM" name="nim" value="{{ $semhas->TA->mahasiswa->nim }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Jurusan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="{{ $semhas->TA->mahasiswa->jurusan->namaJurusan}}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">waktu</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamMulai" placeholder="mulai" value="{{ $semhas->jamMulai }}">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamSelesai" placeholder="selesai" value="{{ $semhas->jamSelesai }}">
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
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" name="tanggal" value="{{ $semhas->tanggal }}" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Ruang Seminar
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="ruang seminar proposal" name="namaRuang" value="{{ $semhas->ruang->namaRuang }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Bapendik
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara" value="{{ $semhas->beritaacara }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Berita Acara Dosen
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="berita acara dosen" name="beritaacara" value="{{ $semhas->beritaacara_dosen }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status Pengajuan
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="status pengajuan" name="status" value="@if($semhas->status == 0)menunggu @elseif ($semhas->status == 1) Diterima @else Ditolak @endif" />
                        </div>
                    </div>

                    <a href="<?= url('') ?>/tugas-akhir/semhas" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'pendaftaran pendadaran')
<div class="row">
    <div class="col-6 grid-margin stretch-card">
        <div class="card card-primary">
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            Berkas Persyaratan
                        </label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="berkas" id="berkas" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-primary card-img-holder text-white  card-hover">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Berkas Persyaratan Meliputi
                </h4>
                <ul>
                    <li>Transkip Nilai</li>
                    <li>Hasil Tes Ujian UEPT</li>
                    <li>Bukti Distribusi Tugas Akhir</li>
                    <span class="badge badge-danger">Berkas dijadikan 1 file PDF</span>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Pengajuan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td>:</td>
                                <td> Qotrunnada Oktiriani </td>
                            </tr>
                            <tr>
                                <td> Diajukan Pada </td>
                                <td>:</td>
                                <td> 20/02/2022 </td>
                            </tr>
                            <tr>
                                <td> Berkas </td>
                                <td>:</td>
                                <td> berkas - H1D018033 </td>
                            </tr>
                            <td> Status Pengajuan </td>
                            <td>:</td>
                            <td>
                                <div class="badge badge-success badge-pill">menunggu persetujuan</div>
                            </td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
                                <td> : </td>
                                <td> - </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

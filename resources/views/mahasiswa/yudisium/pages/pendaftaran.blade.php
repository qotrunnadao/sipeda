@extends('mahasiswa.yudisium.layouts.main')
@section('title', 'Pendaftaran Yudisium')
@section('icon', 'file')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data" id="creatData">
                @csrf
                <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="">
                <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value="">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            Berkas Persyaratan
                        </label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="berkas" id="berkas" />
                        </div>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
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
                    <li>Bukti Validasi Nilai Transkrip Akademik Dengan Ketua Program Studi</li>
                    <li>Judul Tugas Akhir dalam bahasa Indonesia dan Inggris di Acc oleh
                        pembimbing I dan II</li>
                    <li>Foto Copy Ijasah SMA/SMK</li>
                    <li>Nilai UEPT > 400</li>
                    <li>Lembar pengesahan Tugas Akhir asli ( Cap basah)</li>
                    <li>Bukti penyerahan laporan Tugas Akhir ke Perpus Unsoed
                    </li>
                    <li>Form Distribusi Soft Dan Hard Laporan Ta Ke Perpus Fakultas Teknik</li>
                    <li>Surat Bebas Perpus Fakultas Teknik</li>
                    <li>Surat Bebas Perpus Unsoed</li>
                    <li>Surat Bebas Lab Dari Teknik Elektro/Sipil/ Geologi/ Infomtk Dan Industri</li>
                    <li>Sertifikat PKKMB</li>
                    <li>Surat Keterangan Pendamping Ijasah (SKPI) Dan Foto Copy Data Dukung
                        SKPI (Sertifikat, Piagam, Dll Maximal 3 Terbaik)</li>
                    <li>Unggah Artikel Ilmiah Di SIA Unsoed ditandatangani mahasiswa Dan
                        Pembimbing Tugas Akhir</li>
                    <li>SPK (surat perintah Tugas Akhir) dan kartu kendali Tugas Akhir</li>
                    <li>Pas Foto hitam putih 3x4 = 2 lembar (foto diberi nama dan nim)</li>
                    <span class="badge badge-danger">Berkas dijadikan 1 file PDF</span>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
                                <td> </td>
                            </tr>
                            <tr>
                                <td> Diajukan Pada </td>
                                <td>:</td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> Berkas </td>
                                <td>:</td>
                                <td> </td>
                            </tr>
                            <td> Status Pengajuan </td>
                            <td>:</td>
                            <td>

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

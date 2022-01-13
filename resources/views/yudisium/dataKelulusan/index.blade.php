@extends('layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Data Kelulusan')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> NO URUT </th>
                                <th> NAMA </th>
                                <th> NIM</th>
                                <th> L/P</th>
                                <th> TEMPAT/TGL LAHIR </th>
                                <th> TGL MASUK UNSOED </th>
                                <th> ANGKATAN TAHUN</th>
                                <th> NO ALUMNI</th>
                                <th> TANGGAL PENDADARAN</th>
                                <th> TANGGAL YUDISIUM (LULUS)</th>
                                <th> PROGRAM STUDI</th>
                                <th> TOTAL SKS</th>
                                <th> IPK</th>
                                <th> LAMA STUDI</th>
                                <th> PREDIKAT</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>QOTRUNNADA(Mahasiswa)</td>
                                <td>H1D018033(Mahasiswa)</td>
                                <td>PEREMPUAN(Mahasiswa)</td>
                                <td>BANYUMAS, 26 JANUARI 2000 (Mahasiswa)</td>
                                <td>2018(Kelulusan)</td>
                                <td>2018(Mahasiswa)</td>
                                <td>12344(Kelulusan)</td>
                                <td>12-03-2022 (Pendadaran)</td>
                                <td>08-06-2022(Periode Yudisium)</td>
                                <td>INFORMATIKA(Mahasiswa)</td>
                                <td>144(Mahasiswa)</td>
                                <td>3,9(Mahasiswa)</td>
                                <td>3,5 TAHUN(Kelulusan) tanggal masuk unsoed dikurangin - tanggal yudisium</td>
                                <td>SM(Kelulusan)</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelengkapan data kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" id="editData" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Tanggal Masuk Unsoed <code>*</code></label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal_masuk" id="tanggal_masuk" value="" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Nomor Alumni <code>*</code></label>
                            <input type="text" class="form-control" name="no_alumni" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Predikat <code>*</code></label>
                            <select type="text" class="form-control" name="predikat" required>
                                <option value="">PILIH</option>
                                <option value="DP">Dengan Pujian</option>
                                <option value="SM">Sangat Memuaskan</option>
                                <option value="M">Memuaskan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

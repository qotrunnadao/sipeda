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
                                <td>QOTRUNNADA</td>
                                <td>H1D018033</td>
                                <td>PEREMPUAN</td>
                                <td>BANYUMAS, 26 JANUARI 2000</td>
                                <td>2018</td>
                                <td>2018</td>
                                <td>12344</td>
                                <td>12-03-2022</td>
                                <td>08-06-2022</td>
                                <td>INFORMATIKA</td>
                                <td>144</td>
                                <td>3,9</td>
                                <td>3,5 TAHUN</td>
                                <td>SM</td>
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
                            <label for="">Tanggal Masuk Unsoed</label>
                            <input type="text" class="form-control" name="tanggal_masuk" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Nomor Alumni</label>
                            <input type="text" class="form-control" name="no_alumni" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Predikat</label>
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

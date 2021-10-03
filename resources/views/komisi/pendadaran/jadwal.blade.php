@extends('komisi.layouts.main')
@section('content')
@section('icon', 'calendar')
@section('title', 'Jadwal Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#tambahJadwal"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Tanggal Pendadaran </th>
                                <th> Waktu </th>
                                <th> Dosen Penguji 1</th>
                                <th> Dosen Penguji 2</th>
                                <th> Dosen Penguji 3</th>
                                <th> Dosen Penguji 4</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani (H1D018033) </td>
                                <td>
                                    20/02/2022
                                </td>
                                <td> 09:00</td>
                                <td>
                                    Ipung Permadi
                                </td>
                                <td>
                                    Lasmedi Afuan
                                </td>
                                <td>
                                    Teguh Cahyono
                                </td>
                                <td>
                                    Teguh Cahyono
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
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

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal pendadaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Mahasiswa</label>
                        <div class="input-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <div class="input-group clockpicker">
                            <input type="text" class="form-control" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penguji 1</label>
                        <div class="input-group">
                            <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="3">Dosen 1</option>
                                <option value="WY" data-select2-id="17">Dosen 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penguji 2</label>
                        <div class="input-group">
                            <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="3">Dosen 1</option>
                                <option value="WY" data-select2-id="17">Dosen 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penguji 3</label>
                        <div class="input-group">
                            <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="3">Dosen 1</option>
                                <option value="WY" data-select2-id="17">Dosen 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penguji 4</label>
                        <div class="input-group">
                            <select class="form-control" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="3">Dosen 1</option>
                                <option value="WY" data-select2-id="17">Dosen 2</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

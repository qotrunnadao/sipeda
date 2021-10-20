@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Konsultasi TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#exampleModal"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Jumlah Konsultasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($konsultasi as $value )

                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $namaMahasiswa }}</td>
                                <td> {{ $nim }}</td>
                                <td> {{ $namaJurusan }}</td>
                                <td>
                                    {{ $value->count() }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.show', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#exampleModal"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Tanggal Konsultasi </th>
                                <th> Nama Dosen </th>
                                <th> Topik</th>
                                <th> Hasil Konsultasi </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($konsultasi as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->tanggal }} </td>
                                <td> {{ $value->dosen->nama }} </td>
                                <td> {{ $value->topik }} </td>
                                <td> {{ $value->hasil }}</td>
                                <td> @if($value->verifikasiDosen == 0)
                                    <span class="badge badge-danger">false</span>
                                </td>
                                @else
                                <span class="badge badge-success">true</span></td>
                                </td>
                                @endif</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-close"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal Tembah Data Konsultasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleSelectGender">Nama Pembimbing</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Lasmedi Afuan</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                            <option>Ipung Permadi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Konsultasi</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alasan">Hasil Konsultasi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
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

@extends('admin.layouts.main')
@section('content')
@section('icon', 'home-modern')
@section('title', 'Data Ruang Seminar')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-2"> <i class="mdi mdi-upload"></i> Unggah SIA</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Ruang </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($ruang as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->namaRuang }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('ruang.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Komisi -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{route('ruang.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Ruang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="namaRuang" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Edit Ruang -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{route('ruang.update', $value->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Ruang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="namaRuang" value="{{ old('namaRuang') ? old('namaRuang') : $value->namaRuang }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

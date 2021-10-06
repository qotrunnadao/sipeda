@extends('admin.layouts.main')
@section('content')
@section('icon', 'hospital-building')
@section('title', 'Data Jurusan')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4 float-left" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-2"> <i class="mdi mdi-upload"></i> Unggah SIA</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Jurusan </th>
                                <th> Nama fakultas </th>
                                <th> Kode MK </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($jurusan as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->namaJurusan }}</td>
                                <td> {{ $value->fakultas->namaFakultas }}</td>
                                <td> {{ $value->kodemk }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('jurusan.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('jurusan.destroy', $value->id) }}" method="GET">
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

<!-- Tambah Jurusan -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="PUT" action="{{url('/admin/jurusan/store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Jurusan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="namaJurusan" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Fakultas</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="fakultas_id">
                                @foreach ($jurusan as $value )
                                <option value="1" {{ $value->fakultas_id == 1 ? 'selected' : '' }}>Teknik</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Kode Mata Kuliah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kodemk" />
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

<!--edit Jurusan -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @foreach ($jurusan as $value ) --}}
                <form class="forms-sample" method="POST" action="{{route('jurusan.update', $value->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Jurusan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="namaJurusan" value="{{ old('namaJurusan') ? old('namaJurusan') : $value->namaJurusan }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Fakultas</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="fakultas_id">
                                <option value="1" {{ $value->fakultas_id == 1 ? 'selected' : '' }}>Teknik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Kode Mata Kuliah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="kodemk" value="{{ old('kodemk') ? old('kodemk') : $value->kodemk }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection

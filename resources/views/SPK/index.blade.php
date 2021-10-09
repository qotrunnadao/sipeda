@extends('admin.layouts.main')
@section('content')
@section('icon', 'folder-upload')
@section('title', 'Upload SPK TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#uploadSPK"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th> NIM </th>
                                <th> Jurusan </th>
                                <th> File SPK </th>
                                <th> Aksi </th>
                                <th> View </th>
                                <th> Download </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($spk as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $namaMahasiswa}} </td>
                                <td>
                                    {{ $nim }}
                                </td>
                                <td> {{ $namaJurusan }}</td>
                                <td>
                                    {{ $value->fileSPK }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{ route('spk.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td><a href="">View</a></td>
                                <td><a href="">Download</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah SPK -->
<div class="modal fade" id="uploadSPK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload SPK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('spk.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Jurusan</label>
                        <div class="input-group">
                            <<<<<<< HEAD <select type="text" class="form-control" id="jurusan" name="jurusan">
                                =======
                                <select type="text" class="form-control" id="jurusan" name="jurusan">
                                    >>>>>>> e7e0873341cf18da92209a88afa8d27dc0d9964b
                                    <option value="" selected disabled>PILIH</option>
                                    @foreach ($jurusan as $value)
                                    <option value="{{ $value->id }}">{{ $value->namaJurusan }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">NIM</label>
                        <div class="input-group">
                            <<<<<<< HEAD <input type="text" class="form-control" name="nim" />
                            =======
                            <input type="text" class="form-control" name="nim" />
                            >>>>>>> e7e0873341cf18da92209a88afa8d27dc0d9964b
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Mahasiswa</label>
                        <div class="input-group">
                            <<<<<<< HEAD <input type="text" class="form-control" name="name" />
                            =======
                            <input type="text" class="form-control" name="name" />
                            >>>>>>> e7e0873341cf18da92209a88afa8d27dc0d9964b
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Upload SPK</label>
                        <div class="input-group">
                            <<<<<<< HEAD <input type="file" class="form-control" name="fileSPK" />
                            =======
                            <input type="file" class="form-control" name="fileSPK" />
                            >>>>>>> e7e0873341cf18da92209a88afa8d27dc0d9964b
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

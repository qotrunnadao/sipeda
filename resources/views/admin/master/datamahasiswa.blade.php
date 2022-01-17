@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Dosen')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-success float-right" data-toggle="modal" data-target="#unggahexcel"> <i class="mdi mdi-plus"></i> Import Excel</button>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Angkatan</th>
                                <th> IPK</th>
                                <th> Total SKS</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($mahasiswa as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $value->nama }}</td>
                                <td> {{ $value->nim }}</td>
                                <td> {{ $value->jurusan->namaJurusan }}</td>
                                <td> {{ $value->angkatan }}</td>
                                <td> {{ $value->ipk }}</td>
                                <td> {{ $value->sks }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata{{ $value['id'] }}"><i class="mdi mdi-border-color"></i></a>
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
@foreach ($mahasiswa as $value)
{{-- Edit Mahasiswa --}}
<div class="modal fade" id="editdata{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $value->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">IPK <code>*</code></label>
                            <input type="text" value="{{ $value->ipk }}" class="form-control" name="ipk" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Total SKS <code>*</code></label>
                            <input type="text" value="{{ $value->sks }}" class="form-control" name="sks" required />
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
@endforeach
{{-- Unggah Excel --}}
<div class="modal fade" id="unggahexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">unggah file excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dosen.excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <input type="file" class="form-control" name="file" required />
                            @if ($errors->has('file'))
                            <div class="text-danger">
                                {{ $errors->first('file') }}
                            </div>
                            @endif
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


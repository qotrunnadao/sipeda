@extends('layouts.main')
@section('title', 'Periode Yudisium')
@section ('icon', 'folder-upload')
@section('content')
<div class="row">
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#uploadSK"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Periode Yudisium </th>
                                <th> Tanggal Yudisium </th>
                                <th> Nomor Surat </th>
                                <th> File SK</th>
                                <th> Aktif </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($periode as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->namaPeriode }}</td>
                                <td> {{ $value->tanggal}} </td>
                                <td>
                                    {{ $value->nosurat }}
                                </td>
                                <td>
                                    @if (File::exists(public_path('storage/assets/file/sk/' . $value->fileSK . '')))
                                    <div class="btn-group">
                                        <form action="" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileSK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileSK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                                <td> {{ $value->aktif == 0 ? 'false' : 'true'}} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata{{ $value['id'] }}"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('periode.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
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

    <div class="col-md-4 grid-margin">
        <div class="card card-primary">
            <form action="" method="GET" enctype="multipart/form-data" id="creatData">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Periode Yudisium <code>*</code></label>
                        <select type="text" class="form-control" id="periode_id" name="periode_id" required>
                            <option selected disabled>Pilih Periode </option>
                            @foreach ($periode_cetak as $value)
                            <option value="{{ $value->id }} ">{{ $value->namaPeriode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <a href="" onclick="this.href='/yudisium/sk-yudisium/' + document.getElementById('periode_id').value" target="_blank" id="btnSubmit" class="btn btn-gradient-primary "><i class="fa fa-print"></i>
                        Cetak SK</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tambah Periode Yudisium -->
<div class="modal fade" id="uploadSK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Periode Yudisium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('periode.store')}}" method="POST" enctype="multipart/form-data" name="eksport" id="eksport">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Periode Yudisium <code>*</code></label>
                        <div class="input-group">
                            <input type="text" required class="form-control" name="namaPeriode" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Yudisium <code>*</code></label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Yudisium" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nomor Surat <code>(kosongkan jika belum tersedia)</code></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nosurat" id="nosurat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">File Surat Kelulusan Resmi <code>(kosongkan jika belum tersedia)</code></label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="fileSK" />
                        </div>
                        @if ($errors->has('fileSK'))
                        <div class="text-danger">
                            {{ $errors->first('fileSK') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status <code>*</code></label>
                        <div class="input-group">
                            <select type="text" required class="form-control" name="aktif">
                                <option value="" selected disabled>PILIH</option>
                                <option value="1">True</option>
                                <option value="0">False</option>
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
<!-- Modal Edit Periode Yudisium -->
@foreach ( $periode as $value )

<div class="modal fade" id="editdata{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload SK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{ route('periode.update', $value->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Periode Yudisium</label>
                        <div class="input-group">
                            <input type="text" required class="form-control" name="namaPeriode" value="{{ $value->namaPeriode }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Yudisium</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" value="{{ $value->tanggal }}" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nomor Surat</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $value->nosurat }}" name="nosurat" id="nosurat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Upload SK</label>
                        <div class="input-group">
                            <input type="file" class="form-control" value="{{ $value->fileSK }}" name="fileSK" />
                        </div>
                        @if ($errors->has('fileSK'))
                        <div class="text-danger">
                            {{ $errors->first('fileSK') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status</label>
                        <div class="input-group">
                            <select type="text" required class="form-control" name="aktif">
                                <option value="" selected disabled>PILIH</option>
                                <option value="1" {{ "1"==$value->aktif ? 'selected' : '' }}>True</option>
                                <option value="0" {{ "0"==$value->aktif ? 'selected' : '' }}>False</option>
                            </select>
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
@endsection
@section('javascripts')
<script>
    $(document).ready(function () {

    $("#eksport").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

        });
    });
</script>
@endsection

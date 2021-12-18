@extends('layouts.main')
@section('title', 'Periode Yudisium')
@section ('icon', 'folder-upload')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
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
                                <th> tanggal yudisium </th>
                                <th> nomor surat </th>
                                <th> File SK</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($periode as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->tanggal}} </td>
                                <td>
                                    {{ $value->nosurat }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <form action="" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileSK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-fileSK='{{ $value->fileSK }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="" method="GET">
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
</div>

<!-- Modal Tambah SPK -->
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
                <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="yudisium_id" name="yudisium_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Yudisium</label>
                        <div class="input-group">
                            <input type="text" required class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Konsultasi" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nomor Surat</label>
                        <div class="input-group">
                            <input type="text" required class="form-control" name="nosurat" id="nosurat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">File SK</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="fileSK" />
                        </div>
                        @if ($errors->has('fileSK'))
                        <div class="text-danger">
                            {{ $errors->first('fileSK') }}
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload SK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="yudisium_id" name="yudisium_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Upload SK</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="fileSK" />
                        </div>
                        @if ($errors->has('fileSK'))
                        <div class="text-danger">
                            {{ $errors->first('fileSK') }}
                        </div>
                        @endif
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
@section('javascripts')

<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var fileSK = button.data('fileSK')
    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='fileSK']").val(fileSK)
    modal.find(".modal-body form").attr("action",'/yudisium//update/'+id)
    })
</script>
@endsection

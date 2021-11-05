@extends('layouts.main')
@section('content')
@section('icon', 'home-modern')
@section('title', 'Data Ruang Seminar')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> ID </th>
                                <th> Nama Ruang </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($ruang as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> <span class="badge badge-secondary">{{ $value->id }}</span></td>
                                <td> {{ $value->namaRuang }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-ruang='{{ $value->namaRuang }}'><i class="mdi mdi-border-color"></i></a>
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

<!-- Tambah Ruang -->
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
{{-- Edit Ruang --}}
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @foreach ($jurusan as $value ) --}}
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Ruang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="ruang" name="namaRuang" value="" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var ruang = button.data('ruang') // Extract info from data-* attributes

    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='namaRuang']").val(ruang)
    modal.find(".modal-body form").attr("action",'/data-ruang/update/'+id)
    })
</script>
@endsection

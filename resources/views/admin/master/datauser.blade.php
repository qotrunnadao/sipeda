@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data User')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <form action="{{ route('api.store') }}" name="eksport" id="eksport">
                        <button type="submit" class="btn btn-sm btn-gradient-primary float-right" id="btnSubmit"><i class="mdi mdi-plus">
                            </i>Generate Data API User</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Email </th>
                                <th> Level ID</th>
                                <th> Nama Level </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($user as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $value->email }}</td>
                                <td> {{ $value->level_id }}</td>
                                <td> {{ $value->level->namaLevel }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-level_id='{{ $value->level_id }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    {{-- <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div> --}}
                                </td>
                                @endforeach
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah Level User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Level User</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="level_id" required>
                                <option value="">PILIH</option>
                                @foreach ($level as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->namaLevel ? 'selected' : '' }}>{{ $value->namaLevel }}
                                </option>
                                @endforeach
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
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var level_id = button.data('level_id')
    var modal = $(this)

    modal.find(".modal-body select[name='level_id']").val(level_id)
    modal.find(".modal-body form").attr("action",'/data-user/update/'+id)
    })
</script>
@endsection

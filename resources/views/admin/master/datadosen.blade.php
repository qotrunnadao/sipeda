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
                                <th> NIP </th>
                                <th> id user </th>
                                <th> Jurusan</th>
                                <th> isKomisi</th>
                                <th> isKajur</th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($dosen as $value)
                            <tr>
                                <td> {{ $no++ }}</td>
                                <td> {{ $value->nama }}</td>
                                <td> {{ $value->nip }}</td>
                                <td> {{ $value->user_id }}</td>
                                <td> {{ $value->jurusan->namaJurusan }}</td>
                                <td>
                                    @if($value->isKomisi == 0)
                                    <span class="badge badge-danger">false</span>
                                    @else
                                    <span class="badge badge-primary">true</span>
                                    @endif
                                </td>
                                <td>
                                    @if($value->isKajur == 0)
                                    <span class="badge badge-danger">false</span>
                                    @else
                                    <span class="badge badge-primary">true</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-komisi='{{ $value->isKomisi }}' data-kajur='{{ $value->isKajur }}'><i class="mdi mdi-border-color"></i></a>
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

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Is Komisi</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="isKomisi" required>
                                <option value="">PILIH</option>
                                <option value="1">true
                                </option>
                                <option value="0">false
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Is Kajur</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="isKajur" required>
                                <option value="">PILIH</option>
                                <option value="1">true
                                </option>
                                <option value="0">false
                                </option>
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
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var komisi = button.data('komisi')
    var kajur = button.data('kajur')
    var modal = $(this)
    modal.find(".modal-body select[name='isKomisi']").val(komisi)
    modal.find(".modal-body select[name='isKajur']").val(kajur)
    modal.find(".modal-body form").attr("action",'/data-dosen/update/'+id)
    })
</script>
@endsection

@extends('layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Pengajuan Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('yudisium.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM</th>
                                <th> Jurusan</th>
                                <th> Berkas Persyaratan </th>
                                <th> status </th>
                                <th> Periode Yudisium</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($yudisium as $value)

                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }}</td>
                                <td> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                <td> {{ $value->transkip }}</td>
                                <td>
                                    @if($value->status_id == 1)
                                    <span class="badge badge-warning">Review Bapendik</span>
                                    @elseif($value->status_id == 2)
                                    <span class="badge badge-success">Disetujui</span>
                                    @elseif($value->status_id == 3)
                                    <span class="badge badge-danger">Tidak disetujui</span>
                                    @elseif($value->status_id == 4)
                                    <span class="badge badge-primary">boleh ajukan lagi</span>
                                    @else
                                    <span class="badge badge-primary">Selesai</span>
                                    @endif
                                </td>
                                <td> {{ $value->periode_id }} </td>
                                <td>
                                    @if(auth()->user()->level_id == 5)
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-status_id='{{ $value->status_id }}' data-periode_id='{{ $value->periode_id }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.delete', $value->id)}}" method="GET">
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

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Yudisium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status Yudisium</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="status_id">
                                <option value="">PILIH</option>
                                @foreach ($status as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->status ? 'selected' : '' }}>{{ $value->status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Periode Yudisium</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="periode_id">
                                <option value="">PILIH</option>
                                @foreach ($periode as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->tanggal ? 'selected' : '' }}>{{ $value->tanggal }}
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
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var status_id = button.data('status_id')
    var periode_id = button.data('periode_id')
    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='status_id']").val(status_id)
    modal.find(".modal-body input[name='periode_id']").val(periode_id)
    modal.find(".modal-body form").attr("action",'/yudisium//update/'+id)
    })
</script>
@endsection

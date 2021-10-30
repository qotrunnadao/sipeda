@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Pengajuan TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('TA.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Judul </th>
                                <th> Praproposal </th>
                                <th> Dosen Pembimbing 1</th>
                                <th> Dosen Pembimbing 2</th>
                                <th> Status</th>
                                <th> Keterangan </th>
                                @if(auth()->user()->level_id == 2 && 1)
                                <th> Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($tugas_akhir as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }}</td>
                                <td> {{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                <td> {{ $value->judulTA }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->praproposal }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                                <td> {{ $value->dosen1->nama }}</td>
                                <td> {{ $value->dosen2->nama }}</td>
                                <td>
                                    @if($value->status_id == 1)
                                    <span class="badge badge-warning">Review Bapendik</span>
                                    @elseif($value->status_id == 2)
                                    <span class="badge badge-warning">Review Komisi</span>
                                    @elseif($value->status_id == 3)
                                    <span class="badge badge-primary">Layak</span>
                                    @elseif($value->status_id == 4)
                                    <span class="badge badge-danger">Tidak Layak</span>
                                    @elseif($value->status_id == 5)
                                    <span class="badge badge-danger">Revisi</span>
                                    @elseif($value->status_id == 6)
                                    <span class="badge badge-primary">Pelaksanaan</span>
                                    @else
                                    <span class="badge badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td> {{ $value->ket }}</td>
                                @if(auth()->user()->level_id == 2 && 1)
                                <td>
                                    @if (auth()->user()->level_id == 2)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-secondary btn-sm " data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-status_id='{{ $value->status_id }}' data-ket='{{ $value->ket }}'>Verifikasi</a>
                                    </div>
                                    @elseif (auth()->user()->level_id == 1)
                                    <div class="btn-group">
                                        <a href="{{ route('TA.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{ route('TA.delete', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endif
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status TA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status TA</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="status_id">
                                <option value="">PILIH</option>
                                @foreach ($status as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->ket ? 'selected' : '' }}>{{ $value->ket }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="{{ old('ket') }}" name="ket"></textarea>
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
    var ket = button.data('ket')
    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='status_id']").val(status_id)
    modal.find(".modal-body input[name='ket']").val(ket)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/data-TA/update/'+id)
    })
</script>
@endsection

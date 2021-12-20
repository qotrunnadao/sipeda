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
                                <td>
                                    @if($value->berkas != null)
                                    @if (File::exists(public_path('storage/assets/file/Yudisium/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else

                                    <div class="badge badge-danger badge-pill ">Berkas Yudisium Tidak Ada</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-danger">{{ $value->statusyudisium->status}}</span>

                                </td>
                                <td>
                                    @if ($value->periode_id)
                                    {{ $value->periodeyudisium->namaPeriode }}
                                    @else
                                    <span class="badge badge-danger">Data Periode Belum Terbit</span>
                                    @endif
                                </td>

                                <td>
                                    @if(auth()->user()->level_id == 5 && $value->status_id ==2)
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    @elseif (auth()->user()->level_id == 2 )
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
                                <option value="" selected disabled>PILIH</option>
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
                            <select type="text" required class="form-control" name="periode_id">
                                <option value="" selected disabled>PILIH</option>
                                @foreach ($periode as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->namaPeriode ? 'selected' : '' }}>{{ $value->namaPeriode }}
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

    modal.find(".modal-body select[name='status_id']").val(status_id)
    modal.find(".modal-body select[name='periode_id']").val(periode_id)
    modal.find(".modal-body form").attr("action",'/yudisium/data-yudisium/update/'+id)
    })
</script>
@endsection

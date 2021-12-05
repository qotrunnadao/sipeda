@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Pengajuan Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(Auth::user()->level_id == 2)
                <div>
                    <a href="{{ route('pendadaran.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
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
                                <th> Berkas </th>
                                <th> Berita Acara </th>
                                <th> Nomor Surat</th>
                                <th> status </th>
                                <th> Keterangan </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($pendadaran as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }} </td>
                                <td> {{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">Berkas - H1D018033 <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">Berita Acara - H1D018033 <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-danger">Nomer Belum Dimasukkan</span>
                                </td>
                                <td>
                                    @if($value->statuspendadaran_id == 1)
                                    <span class="badge badge-warning">Review Bapendik</span>
                                    @elseif($value->statuspendadaran_id == 2)
                                    <span class="badge badge-warning">Review Komisi</span>
                                    @elseif($value->statuspendadaran_id == 3)
                                    <span class="badge badge-primary">Layak</span>
                                    @elseif($value->statuspendadaran_id == 4)
                                    <span class="badge badge-danger">Tidak Layak</span>
                                    @elseif($value->statuspendadaran_id == 5)
                                    <span class="badge badge-danger">Revisi</span>
                                    @elseif($value->statuspendadaran_id == 6)
                                    <span class="badge badge-primary">Pelaksanaan</span>
                                    @else
                                    <span class="badge badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td> {{ $value->ket }}</td>
                                <td>
                                    @if (auth()->user()->level_id == 2)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-statuspendadaran_id='{{ $value->statuspendadaran_id }}' data-ket='{{ $value->ket }}'>Verifikasi</a>
                                    </div>
                                    @endif
                                    @if (auth()->user()->level_id == 1)
                                    <div class="btn-group">
                                        <a href="{{ route('pendadaran.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    @if(Auth::user()->level_id !== 2)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    @endif
                                    @if(Auth::user()->level_id == 2)
                                    <div class="btn-group">
                                        <a href="" method="POST" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#nomersurat" data-id='{{ $value->id }}' data-no_surat='{{ $value->no_surat }}'><i class="mdi mdi-plus"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="" method="GET" id="export">
                                            <button type="submit" id="btnSubmit" class="btn btn-gradient-primary btn-sm eksport"><i class="mdi mdi-check"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.delete', $value->id) }}" method="GET">
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

<div class="modal fade" id="nomersurat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nomer Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" id="surat" action="">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nomer Surat Berita Acara
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat Berita Acara Seminar Proposal" name="no_surat" />
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

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pendadaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status Pendadaran</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="statuspendadaran_id">
                                <option value="">PILIH</option>
                                @foreach ($status as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->status ? 'selected' : '' }}>{{ $value->status }}
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
    var statuspendadaran_id = button.data('statuspendadaran_id')
    var ket = button.data('ket')
    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='statuspendadaran_id']").val(statuspendadaran_id)
    modal.find(".modal-body input[name='ket']").val(ket)
    modal.find(".modal-body form").attr("action",'/pendadaran/data-pendadaran/update/'+id)
    })
</script>
@endsection

@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Pengajuan Pendadaran')
<div class="row">
    @if(Auth::user()->level_id !== 3)
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Menunggu Verifikasi</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Berkas </th>
                                <th> Berita Acara </th>
                                @if (auth()->user()->level_id == 5 || 2 || 1)
                                <th> Nomor Surat</th>
                                @endif
                                <th> status </th>
                                <th> Keterangan </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($acc_pendadaran as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }} </td>
                                <td> {{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                <td class="text-center">
                                    @if($value->berkas != null)
                                    @if (File::exists(public_path('storage/assets/file/Pendadaran/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.download', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.download', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else

                                    <div class="badge badge-danger badge-pill ">Berkas Pendadaran Tidak Ada</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($value->beritaacara != null)
                                    @if (File::exists(public_path('storage/assets/file/Berita Acara Pendadaran/' . $value->beritaacara . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $value->beritaacara) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $value->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    <div class="badge badge-danger badge-pill ">Berita Acara Pendadaran Belom Terbit</div>
                                    @endif
                                </td>
                                @if ($value->no_surat == null )
                                <td class="text-center">
                                    <span class="badge badge-danger">Nomer Belum Dimasukkan</span>
                                </td>
                                @elseif(auth()->user()->level_id == 5 || 2 || 1)
                                <td class="text-center"> {{ $value->no_surat}} </td>
                                @endif
                                <td>
                                    {{ $value->statuspendadaran->status}}
                                </td>
                                @if ($value->ket == null)
                                <td>
                                    <span class="badge badge-danger">Tidak Ada Data Keterangan</span>
                                </td>
                                @else
                                <td> {{ $value->ket }}</td>
                                @endif
                                <td>
                                    @if (auth()->user()->level_id == 2 && $value->statuspendadaran_id == 2)
                                    {{-- verifikasi --}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-statuspendadaran_id='{{ $value->statuspendadaran_id }}' data-ket='{{ $value->ket }}'>Verifikasi</a>
                                    </div>
                                    @elseif ( $value->statuspendadaran_id != 2 && auth()->user()->level_id == 2 || auth()->user()->level_id == 1)
                                    {{-- edit data pendadaran --}}
                                    <div class="btn-group">
                                        <a href="{{ route('pendadaran.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @elseif ( $value->statuspendadaran_id > 3 && auth()->user()->level_id == 5 || 3)
                                    {{-- edit data Berita Acara pendadaran Kajur dan Dospeng--}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editberita" data-id='{{ $value->id }}' data-beritaacara='{{ $value->beritaacara }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    @if ($value->no_surat == null && auth()->user()->level_id == 2 && $value->statuspendadaran_id == 4)
                                    {{-- nomer surat --}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#nomersurat" data-id='{{ $value->id }}' data-no_surat='{{ $value->no_surat }}'><i class="mdi mdi-plus"></i></a>
                                    </div>
                                    @elseif ($value->beritaacara == null && auth()->user()->level_id == 2 && $value->statuspendadaran_id == 4)
                                    {{-- eksport --}}
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.eksport', $value->id) }}" method="get" id="eksport">
                                            <button type="submit" class="btn btn-gradient-primary btn-sm eksport" id="btnSubmit"><i class="mdi mdi-check"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                    {{-- Hapus --}}
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
    @endif
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
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan</th>
                                <th> Berkas </th>
                                <th> Berita Acara </th>
                                @if (auth()->user()->level_id == 5 || 2 || 1)
                                <th> Nomor Surat</th>
                                @endif
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
                                    @if($value->berkas != null)
                                    @if (File::exists(public_path('storage/assets/file/Pendadaran/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.download', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.download', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else

                                    <div class="badge badge-danger badge-pill ">Berkas Pendadaran Tidak Ada</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($value->beritaacara != null)
                                    @if (File::exists(public_path('storage/assets/file/Berita Acara Pendadaran/' . $value->beritaacara . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $value->beritaacara) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $value->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    <div class="badge badge-danger badge-pill ">Berita Acara Pendadaran Belom Terbit</div>
                                    @endif
                                </td>
                                @if ($value->no_surat == null )
                                <td class="text-center">
                                    <span class="badge badge-danger">Nomer Belum Dimasukkan</span>
                                </td>
                                @elseif(auth()->user()->level_id == 5 || 2 || 1)
                                <td class="text-center"> {{ $value->no_surat}} </td>
                                @endif
                                <td>
                                    {{ $value->statuspendadaran->status}}
                                </td>
                                @if ($value->ket == null)
                                <td>
                                    <span class="badge badge-danger">Tidak Ada Data Keterangan</span>
                                </td>
                                @else
                                <td> {{ $value->ket }}</td>
                                @endif
                                <td>
                                    @if (auth()->user()->level_id == 2 && $value->statuspendadaran_id == 2)
                                    {{-- verifikasi --}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-statuspendadaran_id='{{ $value->statuspendadaran_id }}' data-ket='{{ $value->ket }}'>Verifikasi</a>
                                    </div>
                                    @elseif ( $value->statuspendadaran_id != 2 && auth()->user()->level_id == 2 || auth()->user()->level_id == 1)
                                    {{-- edit data pendadaran --}}
                                    <div class="btn-group">
                                        <a href="{{ route('pendadaran.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @elseif ( $value->statuspendadaran_id > 3 && auth()->user()->level_id == 5 || 3)
                                    {{-- edit data Berita Acara pendadaran Kajur dan Dospeng--}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editberita" data-id='{{ $value->id }}' data-beritaacara='{{ $value->beritaacara }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    @if ($value->no_surat == null && auth()->user()->level_id == 2 && $value->statuspendadaran_id == 4)
                                    {{-- nomer surat --}}
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#nomersurat" data-id='{{ $value->id }}' data-no_surat='{{ $value->no_surat }}'><i class="mdi mdi-plus"></i></a>
                                    </div>
                                    @elseif ($value->beritaacara == null && auth()->user()->level_id == 2 && $value->statuspendadaran_id == 4)
                                    {{-- eksport --}}
                                    <div class="btn-group">
                                        <form action="{{ route('pendadaran.eksport', $value->id) }}" method="get" id="eksport">
                                            <button type="submit" class="btn btn-gradient-primary btn-sm eksport" id="btnSubmit"><i class="mdi mdi-check"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                    {{-- Hapus --}}
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

{{-- Tambah Nomer SUrat --}}
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
                        <div class="col">
                            <label>
                                Nomer Surat Berita Acara
                            </label>
                            <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat Berita Acara Ujian Pendadaran" name="no_surat" />
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
{{-- Verifikasi --}}
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
                        <div class="input-group">
                            <label for="exampleInputEmail3">Keterangan</label>
                            <div class="input-group">
                                <textarea type="text" class="form-control" placeholder="{{ old('ket') }}" name="ket"></textarea>
                            </div>
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
{{-- Edit Data Berita Acara Kajur --}}
<div class="modal fade" id="editberita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berita Acara Ujian Pendadaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" id="beritaAcara" action="" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            {{-- <input type="file" class="form-control" placeholder="Berita Acara Ketua Jurusan" name="beritaacara" /> --}}
                            <input type="file" class="form-control" placeholder="Berita Acara Ketua Jurusan" name="berita" />
                            @if ($errors->has('beritaacara'))
                            <div class="text-danger">
                                {{ $errors->first('beritaacara') }}
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
{{-- edit data Berita Acara pendadaran Kajur dan Dospeng--}}
<script>
    $(document).ready(function () {

    $("#beritaAcara").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
{{-- eksport--}}
<script>
    $(document).ready(function () {

    $("#eksport").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var statuspendadaran_id = button.data('statuspendadaran_id')
    var ket = button.data('ket')
    var modal = $(this)

    modal.find(".modal-body input[name='statuspendadaran_id']").val(statuspendadaran_id)
    modal.find(".modal-body input[name='ket']").val(ket)
    modal.find(".modal-body form").attr("action",'/pendadaran/data-pendadaran/verifikasi/'+id)
    })
</script>
<script>
    $('#editberita').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var beritaacara = button.data('berita')

    var modal = $(this)

    modal.find(".modal-body input[name='berita']").val(beritaacara)
    modal.find(".modal-body form").attr("action",'/pendadaran/beritaacara/update/'+id)
    })
</script>
<script>
    $('#nomersurat').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var no_surat = button.data('no_surat')

    var modal = $(this)

    modal.find(".modal-body input[name='no_surat']").val(no_surat)
    modal.find(".modal-body form").attr("action",'/pendadaran/beritaacara/store/'+id)
    })
</script>
@endsection

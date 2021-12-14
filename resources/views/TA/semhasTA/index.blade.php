@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Seminar Hasil')
@if(auth()->user()->level_id == 2)
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('semhas.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <h4 class="card-title">Pengajuan Seminar Hasil</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Nomer Surat </th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semhas_all as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>

                                <td> {{ $value->TA->mahasiswa->nim }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        @if (File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $value->beritaacara . '')))
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post" target="blank">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                </td>
                                @if ($value->no_surat == null)
                                <td class="text-center">
                                    <span class="badge badge-danger">Nomer Belum Dimasukkan</span>
                                </td>
                                @else
                                <td class="text-center"> {{ $value->no_surat}} </td>
                                @endif
                                <td class="text-center">
                                    @if ($value->status != 0)
                                        @if ($value->no_surat == null)
                                        <div class="btn-group">
                                            <a href="" method="POST" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#nomersurat" data-id='{{ $value->id }}' data-no_surat='{{ $value->no_surat }}'><i class="mdi mdi-plus"></i></a>
                                        </div>
                                        @elseif ( $value->beritaacara == null)
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.eksport', $value->ta_id) }}" method="GET" id="export">
                                                <button type="submit" id="btnSubmit" class="btn btn-gradient-primary btn-sm eksport"><i class="mdi mdi-check"></i></button>
                                            </form>
                                        </div>
                                        @endif
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>

                                    @else
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @endif
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
{{-- Tambah Data Nomer Surat --}}
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
                    {{-- @dd($semprop_all); --}}
                    {{-- <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $semprop_all->ta_id }}"> --}}
                    <div class="form-group row">
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat Berita Acara Seminar Hasil" name="no_surat" />
                            </div>
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
@section('javascripts')
<script>
    $('#nomersurat').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var no_surat = button.data('no_surat')

    var modal = $(this)

    modal.find(".modal-body input[name='no_surat']").val(no_surat)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/semhas/surat/' + id)
    })
</script>
@endsection
@elseif(auth()->user()->level_id == 3 || 1 || 5)
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengajuan Seminar Hasil</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semhas_dosen as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        @if (File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $value->beritaacara . '')))
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post" target="blank">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($value->status != 0)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-beritaacara='{{ $value->beritaacara }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Data Berita Acara --}}
    <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Berita Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="POST" id="editData" action="" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <input type="file" class="form-control" name="berita" />
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
    @if(auth()->user()->level_id == 1 || 5)
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Seminar Hasil Jurusan</h4>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> Ruang </th>
                                <th class="text-center"> Tanggal </th>
                                <th class="text-center"> Waktu </th>
                                <th class="text-center"> Status</th>
                                <th class="text-center"> Berita Acara</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($semhas_jurusan as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }} </td>
                                <td class="text-center"> {{ $value->TA->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center"> {{ $value->ruang->namaRuang }} </td>
                                <td class="text-center"> {{ $value->tanggal }}</td>
                                <td class="text-center"> {{ $value->jamMulai }} - {{ $value->jamSelesai }} </td>
                                <td class="text-center">
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($value->beritaacara == null)
                                    <span class="badge badge-danger">Belum Ada Data Berita Acara</span>
                                    @else
                                    <div class="btn-group">
                                        @if (File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $value->beritaacara . '')))
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post" target="blank">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">
                                            <form action="{{ route('semhas.download', $value->beritaacara) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($value->status != 0)
                                    <div class="btn-group">
                                        <a href="{{ route('semhas.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('semhas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @endif
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
</div>
@endif
<script>
    $(document).ready(function () {

    $("#export").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
<script>
    $(document).ready(function () {

    $("#editData").submit(function () {

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
    var berita = button.data('berita')

    var modal = $(this)

    modal.find(".modal-body input[name='berita']").val(berita)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/semhas/update/'+id)
    })
</script>
@endsection

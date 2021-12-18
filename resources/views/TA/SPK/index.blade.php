@extends('layouts.main')
@section('content')
@section('icon', 'folder-upload')
@section('title', 'Upload SPK TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama </th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan </th>
                                <th class="text-center"> File SPK </th>
                                @if (auth()->user()->level_id == 5 || auth()->user()->level_id == 2)
                                <th class="text-center"> Nomer Surat </th>
                                <th class="text-center"> Aksi </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($spk as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama}} </td>
                                <td class="text-center">
                                    {{ $value->mahasiswa->nim }}
                                </td>
                                <td class="text-center"> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                @if ($value->spk == null)
                                <td class="text-center">
                                    <span class="badge badge-danger">SPK Tugas Akhir Belum Terbit</span>
                                </td>
                                @else
                                <td class="text-center">
                                    @if (File::exists(public_path('storage/assets/file/SPK TA/' . $value->spk->fileSPK . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('spk.download', $value->spk->fileSPK) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('spk.download', $value->spk->fileSPK) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                                @endif
                                @if ($value->no_surat == null)
                                <td class="text-center">
                                    <span class="badge badge-danger">Nomer Belum Dimasukkan</span>
                                </td>
                                @elseif(auth()->user()->level_id == 5 || auth()->user()->level_id == 2)
                                <td class="text-center"> {{ $value->no_surat}} </td>
                                @endif
                                <td class="text-center">
                                    @if ($value->no_surat == null && auth()->user()->level_id == 2)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#nomersurat" data-id='{{ $value->id }}' data-no_surat='{{ $value->no_surat }}'><i class="mdi mdi-plus"></i></a>
                                    </div>
                                    @elseif ($value->spk == null && auth()->user()->level_id == 2)
                                    <div class="btn-group">
                                        <form action="{{ route('spk.eksport', $value->id) }}" method="get" id="eksport">
                                            <button type="submit" class="btn btn-gradient-primary btn-sm eksport" id="btnSubmit"><i class="mdi mdi-check"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                    @if ($value->spk && $value->no_surat && auth()->user()->level_id == 2 || auth()->user()->level_id == 5)
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-fileSPK='{{ $value->spk->fileSPK }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('spk.destroy', $value->spk->fileSPK) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Edit Data SPK --}}
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload SPK Ketua Jurusan</h5>
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
                            <input type="file" class="form-control" placeholder="SPK Ketua Jurusan" name="fileSPK" required />
                            @if ($errors->has('fileSPK'))
                            <div class="text-danger">
                                {{ $errors->first('fileSPK') }}
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
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat SPK" name="no_surat" />
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


<script>
    $(document).ready(function () {

    $("#editData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
<script>
    $(document).ready(function () {

    $("#eksport").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
<script>
    $(document).ready(function () {

    $("#surat").submit(function () {

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
    var fileSPK = button.data('fileSPK')

    var modal = $(this)

    modal.find(".modal-body input[name='fileSPK']").val(fileSPK)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/spk/update/'+id)
    })
</script>
<script>
    $('#nomersurat').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var no_surat = button.data('no_surat')

    var modal = $(this)

    modal.find(".modal-body input[name='no_surat']").val(no_surat)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/spk/create/'+id)
    })
</script>
@endsection

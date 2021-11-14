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
                                @if (auth()->user()->level_id == 5)
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
                                    @if (auth()->user()->level_id == 5)
                                <td>
                                    <a href="" id="linkButton">
                                        <button type="submit" id="btnSubmit" class="btn btn-gradient-primary btn-sm eksport" idv="{{ $value->ta_id }}"><i class="mdi mdi-check"></i></button>
                                    </a>
                                </td>
                                @endif
                                </td>
                                @else
                                <td>
                                    @if ($value->spk->fileSPK == null)
                                    SPK Tugas Akhir
                                    <div class="badge badge-primary badge-pill float-right">Belum Terbit</div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('spk.download', $value->spk->fileSPK) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                                @if (auth()->user()->level_id == 5)
                                <td>
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
                                </td>
                                @endif
                                @endif
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
                            <input type="file" class="form-control" placeholder="SPK Ketua Jurusan" name="fileSPK" />
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
        var cek = true;

    $("#btnSubmit").on('click', function () {
        if (cek) {
        var id = $('#btnSubmit').attr('idv');
        console.log(id);
        $("#linkButton").attr("href","/tugas-akhir/spk/pdf/" + id);
        cek = false;
        }else {

            $("#linkButton").attr("href","");
        }

        // $('#btnSubmit').submit();

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
    var fileSPK = button.data('fileSPK')

    var modal = $(this)

    modal.find(".modal-body input[name='fileSPK']").val(fileSPK)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/spk/update/'+id)
    })
</script>
@endsection

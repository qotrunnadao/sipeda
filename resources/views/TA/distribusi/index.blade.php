@extends('layouts.main')
@section('content')
@section('icon', 'share-variant')
@section('title', 'Data Distribusi TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->level_id == 2)
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center"> No. </th>
                                <th class="text-center"> Nama Mahasiswa </th>
                                <th class="text-center"> NIM </th>
                                <th class="text-center"> Jurusan</th>
                                <th class="text-center"> File Distribusi </th>
                                <th class="text-center"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ( $distribusi as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->ta->mahasiswa->nama }}</td>
                                <td class="text-center"> {{ $value->ta->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->ta->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        @if (File::exists(public_path('storage/assets/file/fileDistribusiTA/' . $value->fileDistribusi . '')))
                                        <div class="btn-group">
                                            <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" method="post" target="blank">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">
                                            <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('distribusi.destroy', $value->id) }}" method="GET">
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
<!-- Modal Tambah Data Konsultasi -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('distribusi.show')}}" id="createData" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Jurusan <code>*</code></label>
                        <div class="input-group">
                            <select type="text" required class="form-control" id="jurusan" name="jurusan">
                                <option selected disabled>Pilih Jurusan </option>
                                @foreach ($jurusan as $value)
                                <option value="{{ $value->id }} ">{{ $value->namaJurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('jurusan'))
                        <div class="text-danger">
                            {{ $errors->first('jurusan') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">NIM <code>*</code></label>
                        <div class="input-group">
                            <select type="text" required class="form-control" id="nim" name="nim">
                                <option value="" selected disabled>Pilih NIM </option>
                            </select>
                        </div>
                        @if ($errors->has('nim'))
                        <div class="text-danger">
                            {{ $errors->first('nim') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Mahasiswa <code>*</code></label>
                        <div class="input-group">
                            <input type="text" required class="form-control" name="name" id="name" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">File Distribusi <code>*</code></label>
                        <input type="file" required class="form-control" name="Distribusi" />
                        @if ($errors->has('fileDistribusi'))
                        <div class="text-danger">
                            {{ $errors->first('fileDistribusi') }}
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('#jurusan').on('change', function (event) {

    $("#nim").find('option').not(':first').remove();
    $("#name").val('');
    var id = $(this).val();

    $.ajax({
    type:'POST',
    url:"{{ route('distribusi.nim') }}",
    data:{id:id},
    success:function(data){
        var nim = document.getElementById('nim')
            for (var i = 0; i < data.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
                nim.innerHTML = nim.innerHTML +
                    '<option value="' + data[i]['mahasiswa']['id'] + '" data-id="'+data[i]['id']+ '" data-nama="'+data[i]['mahasiswa']['nama']+'">' + data[i]['mahasiswa']['nim'] + '</option>';

            }
    }
    });


    })
    $('#nim').on('change', function (event) {

    // var kel = $(this).val();
    var id = $(this).find(':selected').data('id');
    var name = $(this).find(':selected').data('nama');

    $('#ta_id').val(id);
    $('#name').val(name);
    // $('#keluhan').val(kel);

})

</script>

<script>
    $(document).ready(function () {

    $("#creatData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection

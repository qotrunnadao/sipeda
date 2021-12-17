@extends('layouts.main')
@section('content')
@section('icon', 'folder-account')
@section('title', 'Data Konsultasi TA')
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
                                <th class="text-center"> Jumlah Konsultasi </th>
                                <th class="text-center"> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($tugas_akhir as $value )

                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }}</td>
                                <td class="text-center"> {{ $value->mahasiswa->nim }}</td>
                                <td class="text-center"> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                <td class="text-center">
                                    {{ $value->konsultasiTA->count() }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.show', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-eye"></i></a>
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
                <form class="forms-sample" action="{{route('konsultasi.store')}}" id="createData" method="post">
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
                        <label for="exampleSelectGender">Nama Pembimbing <code>*</code></label>
                        <select type="text" required class="form-control" name="dosen_id" id="dosen_id">
                            <option value="" selected disabled> Pilih Dosen </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Konsultasi <code>*</code></label>
                        <div class="input-group">
                            <input type="text" required class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Konsultasi" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Topik Konsultasi <code>*</code></label>
                        <div class="input-group">
                            <input type="text" required class="form-control" name="topik" id="topik" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alasan">Hasil Konsultasi <code>*</code></label>
                        <textarea class="form-control" required id="exampleTextarea1" rows="4" name="hasil" id="hasil"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    $("#createData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection
@section('javascripts')
<script>
    var coba;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('#jurusan').on('change', function (event) {

        $("#nim").find('option').not(':first').remove();
        $("#name").val('');
        $("#dosen_id").find('option').not(':first').remove();
        var id = $(this).val();

        $.ajax({
           type:'POST',
           url:"{{ route('konsultasi.nim') }}",
           data:{id:id},
           success:function(data){
               window.coba = data;
               var nim = document.getElementById('nim')
                for (var i = 0; i < data.length; i++) {
                // POPULATE SELECT ELEMENT WITH JSON.
                    nim.innerHTML = nim.innerHTML +
                        '<option value="' + data[i]['mahasiswa']['id'] +
                       '" data-array="'+i+'">'
                        + data[i]['mahasiswa']['nim'] + '</option>';

                }
           }
        });
    })
    $('#nim').on('change', function (event) {

    // var kel = $(this).val();
    var array = $(this).find(':selected').data('array');
    $('#ta_id').val(coba[array]['id']);
    $('#name').val(coba[array]['mahasiswa']['nama']);
    dosen_id.innerHTML = dosen_id.innerHTML +
        '<option value="' + coba[array]['dosen1']['id'] + '" >'
        + coba[array]['dosen1']['nama'] + '</option>';
    dosen_id.innerHTML = dosen_id.innerHTML +
        '<option value="' + coba[array]['dosen2']['id'] + '" >'
        + coba[array]['dosen2']['nama'] + '</option>';
    // $('#keluhan').val(kel);

})

</script>
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var dosen_id = button.data('dosen_id')
    var tanggal = button.data('tanggal')
    var topik = button.data('topik')
    var hasil = button.data('hasil')
    var modal = $(this)

    modal.find(".modal-body select[name='dosen_id']").val(dosen_id)
    modal.find(".modal-body input[name='tanggal']").val(tanggal)
    modal.find(".modal-body input[name='topik']").val(topik)
    modal.find(".modal-body textarea[name='hasil']").val(hasil)
    modal.find(".modal-body form").attr("action",'/mahasiswa/tugas-akhir/konsultasi/update/'+id)
    })
</script>
@endsection

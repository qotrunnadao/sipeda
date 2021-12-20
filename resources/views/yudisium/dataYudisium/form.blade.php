@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')@endif" enctype="multipart/form-data" id="eksport"  method="post">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}@endif
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            @if($button == 'Edit')
                            <div class="form-group">
                                <label>
                                    Nama
                                </label>
                                <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="namaMahasiswa" value="{{ $data_yudisium->mahasiswa->nama }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    NIM
                                </label>
                                <input type="text" class="form-control" placeholder="NIM" name="nim" value="{{ $data_yudisium->mahasiswa->nim }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    Jurusan
                                </label>
                                <input type="text" class="form-control" required placeholder="Jurusan" name="namaJurusan" value="{{ $data_yudisium->mahasiswa->jurusan->namaJurusan }}" readonly />
                            </div>
                            @endif
                            @if ($button == 'Tambah')
                            <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="{{ $tahun->id }}">
                            <div class="form-group">
                                <label>Jurusan <code>*</code></label>
                                <select type="text" class="form-control" id="jurusan" name="jurusan" required>
                                    <option selected disabled>Pilih Jurusan </option>
                                    @foreach ($jurusan as $value)
                                    <option value="{{ $value->id }} ">{{ $value->namaJurusan }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jurusan'))
                                <div class="text-danger">
                                    {{ $errors->first('jurusan') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label> NIM <code>*</code></label>
                                <select type="text" class="form-control" id="nim" name="nim" required>
                                    <option value="" selected disabled>Pilih NIM </option>
                                </select>
                                @if ($errors->has('nim'))
                                <div class="text-danger">
                                    {{ $errors->first('nim') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa <code>*</code></label>
                                <input type="text" class="form-control" name="name" id="name" value="" readonly />
                            </div>
                            @endif
                            <div class="form-group">
                                <label>
                                    Berkas Persyaratan
                                </label>
                                <input type="file" class="form-control" placeholder="transkip nilai" name="berkas" value="@if ($button == 'Tambah'){{ old('berkas') }}@else{{ $data_yudisium->berkas }}@endif" />
                                @if ($errors->has('berkas'))
                                <div class="text-danger">
                                    {{ $errors->first('berkas') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Periode Yudisium
                                </label>
                                <select name="periode_id" id="periode_id" class="form-control">
                                <option value="" selected disabled>PILIH Periode Yudisium</option>
                                @foreach ($periode as $value )
                                    <option value="{{ $value->id }}" >{{ $value->namaPeriode }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Status
                                </label>
                                <select name="statusyudisium_id" id="statusyudisium" class="form-control">
                                <option value="" selected disabled>PILIH Status Yudisium</option>
                                @foreach ($status as $value )
                                    <option value="{{ $value->id }}">{{ $value->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Keterangan
                                </label>
                                <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_yudisium->ket }}@endif</textarea>
                                <p class="text-muted"> * tidak wajib di isi</p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/yudisium/data-yudisium" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
<script>
    $(document).ready(function () {

    $("#eksport").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
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
           url:"{{ route('yudisium.nim') }}",
           data:{id:id},
           success:function(data){
               var nim = document.getElementById('nim')
                for (var i = 0; i < data.length; i++) {
                // POPULATE SELECT ELEMENT WITH JSON.
                    nim.innerHTML = nim.innerHTML +
                        '<option value="' + data[i]['id'] + '" data-nama="'+data[i]['nama']+'">' + data[i]['nim'] + '</option>';

                }
           }
        });


    })
    $('#nim').on('change', function (event) {

    var kel = $(this).val();
    var id = $(this).find(':selected').data('id');
    var name = $(this).find(':selected').data('nama');

    $('#mahasiswa_id').val(id);
    $('#name').val(name);
    // $('#keluhan').val(kel);

})

</script>
@endsection

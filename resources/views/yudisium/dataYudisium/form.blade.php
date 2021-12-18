@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')/{{ $data_yudisium->id}}@endif" method="post">
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
                                <input type="file" class="form-control" placeholder="transkip nilai" name="transkip" value="@if ($button == 'Tambah'){{ old('transkip') }}@else{{ $data_yudisium->transkip }}@endif" />
                                @if ($errors->has('transkip'))
                                <div class="text-danger">
                                    {{ $errors->first('transkip') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Tanggal Yudisium
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Yudisium" name="tanggal" value="@if ($button == 'Tambah'){{ old('tanggal') }}@else{{ $data_yudisium->tanggal }}@endif" />
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Waktu Yudisium
                                </label>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" placeholder="Waktu Yudisium" name="tanggal" value="@if ($button == 'Tambah'){{ old('waktu') }}@else{{ $data_yudisium->waktu }}@endif">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-clock"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Status
                                </label>
                                <select name="statusyudisium_id" id="statusyudisium" class="form-control">
                                    @foreach ($status as $value )
                                    <option value="@if ($button == 'Tambah'){{ old('status') }}@else{{ $status }}@endif">{{ $value->status}}</option>
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
                    <a href="" type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</a>
                </div>
            </form>
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
           url:"{{ route('pendadaran.nim') }}",
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

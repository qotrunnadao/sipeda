@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Tambah Seminar Hasil')
<div class="row">
    {{-- <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semhas.store') }}" id="creatData" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Jurusan</label>
                        </div>
                        <div class="col-lg-8">
                            <select type="text" class="form-control" id="jurusan" name="jurusan">
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
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">NIM</label>
                        </div>
                        <div class="col-lg-8">
                            <select type="text" class="form-control" id="nim" name="nim">
                                <option value="" selected disabled>Pilih NIM </option>
                            </select>
                        </div>
                        @if ($errors->has('nim'))
                        <div class="text-danger">
                            {{ $errors->first('nim') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Nama Mahasiswa</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="name" id="name" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Judul Penelitian</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" maxlength="100" name="judul" id="judul" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">waktu</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamMulai" placeholder="mulai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="jamSelesai" placeholder="selesai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tanggal Seminar
                        </label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Seminar" name="tanggal" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Ruang Seminar</label>
                        </div>
                        <div class="col-lg-8">
                            <select class="form-control" id="ruang" name="ruang" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                @foreach ($Ruang as $value)
                                <option value="{{ $value->id }} ">{{ $value->namaRuang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nomer Surat Berita Acara
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat Berita Acara" name="no_surat" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">
                            File Laporan
                        </label>
                        <div class="col-lg-8">
                            <input type="file" class="form-control" name="laporan" />
                        </div>
                    </div>
                    <a href="{{ route('semhas.index') }}" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{ route('semhas.store') }}" id="creatData" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan <code>*</code></label>
                                <select type="text" class="form-control" id="jurusan" name="jurusan">
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
                                <label>NIM <code>*</code></label>
                                <select type="text" class="form-control" id="nim" name="nim">
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
                            <div class="form-group">
                                <label>Judul Penelitian <code>*</code></label>
                                <input class="form-control" name="judul" id="judul" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    File Laporan <code>*</code>
                                </label>
                                <input type="file" class="form-control" name="laporan" />
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>waktu Mulai <code>*</code></label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamMulai" placeholder="mulai">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>waktu Selesai <code>*</code></label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamSelesai" placeholder="selesai">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>
                                        Tanggal Seminar <code>*</code>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Seminar" name="tanggal" />
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Ruang Seminar <code>*</code></label>
                                    <select class="form-control" id="ruang" name="ruang" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach ($Ruang as $value)
                                        <option value="{{ $value->id }} ">{{ $value->namaRuang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Nomer Surat Berita Acara <code>*</code>
                                </label>
                                <input type="text" class="form-control" required placeholder="Masukkan Nomer Surat Berita Acara" name="no_surat" />
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('semhas.index') }}" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    $("#creatData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>

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
           url:"{{ route('semhas.nim') }}",
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
@endsection

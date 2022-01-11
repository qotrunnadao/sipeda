@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Pendadaran')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}@if($button == 'Edit')@endif" enctype="multipart/form-data" id="eksport" method="post">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}@endif
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            @if ($button == 'Edit')
                            <div class="form-group">
                                <label>
                                    Nama Mahasiswa
                                </label>
                                <input readonly type="text" class="form-control" required placeholder="Nama Mahasiswa" id="name" name="name" value="{{ $data_pendadaran->mahasiswa->nama }}" />
                            </div>
                            <div class="form-group">
                                <label>
                                    NIM
                                </label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $data_pendadaran->mahasiswa->nim }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    Jurusan
                                </label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data_pendadaran->mahasiswa->jurusan->namaJurusan }}" readonly />
                            </div>
                            @if ( $data_pendadaran->statuspendadaran_id >=4)
                            <div class="form-group">
                                <label>
                                    Berita Acara Ujian Pendadaran
                                </label>
                                <input type="file" class="form-control" placeholder="berita acara Ujian Pendadaran" name="beritaacara" />
                                @if ($errors->has('beritaacara'))
                                <div class="text-danger">
                                    {{ $errors->first('beritaacara') }}
                                </div>
                                @endif
                            </div>
                            @endif
                            @endif
                            @if ($button == 'Tambah')
                            <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="{{ $tahun->id }}">
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
                                <label> NIM <code>*</code></label>
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
                                <label>
                                    Berkas Persyaratan <code>*</code>
                                </label>
                                <input type="file" class="form-control" placeholder="Berkas Persyaratan Ujian Pendadaran" name="berkas" id="berkas" />
                                @if ($errors->has('berkas'))
                                <div class="text-danger">
                                    {{ $errors->first('berkas') }}
                                </div>
                                @endif
                            </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>
                                        Tanggal Ujian Pendadaran @if ($button == 'Tambah')<code>*</code> @endif
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Pendadaran" value="@if ($button == 'Tambah'){{ old('tanggal') }}@else{{ $data_pendadaran->tanggal }}@endif" />
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Ruang Seminar @if ($button == 'Tambah')<code>*</code> @endif</label>
                                    <select class="form-control" id="ruang" name="ruang" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach ($ruang as $value)
                                        <option value="{{ $value->id }} " {{ $value->id == $data_pendadaran->ruangpendadaran_id ? 'selected' : '' }}>{{ $value->namaRuang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Waktu Ujian Pendadaran @if ($button == 'Tambah')<code>*</code> @endif</label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamMulai" placeholder="mulai" value="@if ($button == 'Tambah'){{ old('jamMulai') }}@else{{ $data_pendadaran->jamMulai }}@endif" />
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Waktu Ujian Pendadaran @if ($button == 'Tambah')<code>*</code> @endif</label>
                                    <div class="input-group clockpicker">
                                        <input type="text" class="form-control" name="jamSelesai" placeholder="selesai" value="@if ($button == 'Tambah'){{ old('jamSelesai') }}@else{{ $data_pendadaran->jamSelesai }}@endif" />
                                        <span class="input-group-text">
                                            <i class="mdi mdi-clock"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Berita Acara <code>*</code>
                                </label>
                                <input type="file" class="form-control" placeholder="Berita Acara Dosen" name="beritaacara" id="beritaacara" />
                                @if ($errors->has('beritaacara'))
                                <div class="text-danger">
                                    {{ $errors->first('beritaacara') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Dosen Penguji 1 @if ($button == 'Tambah')<code>*</code> @endif
                                </label>
                                <select name="penguji1_id" id="dropdown1" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($dosen as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_pendadaran->penguji1_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Dosen Penguji 2 @if ($button == 'Tambah')<code>*</code> @endif
                                </label>
                                <select name="penguji2_id" id="dropdown2" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($dosen as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_pendadaran->penguji2_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Dosen Penguji 3 @if ($button == 'Tambah')<code>(jika ada)</code> @endif
                                </label>
                                <select name="penguji3_id" id="dropdown3" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($dosen as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_pendadaran->penguji3_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Dosen Penguji 4 @if ($button == 'Tambah')<code>(jika ada)</code> @endif
                                </label>
                                <select name="penguji4_id" id="dropdown4" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($dosen as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_pendadaran->penguji4_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Status
                                </label>
                                <select name="statuspendadaran_id" id="status" class="form-control">
                                    @foreach ($status as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_pendadaran->statuspendadaran_id ? 'selected' : '' }}>{{ $value->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Keterangan
                                </label>
                                <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_pendadaran->ket }}@endif</textarea>
                                <p class="text-muted"> * tidak wajib di isi</p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/pendadaran/data-pendadaran" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
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

@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', $button.' Tugas Akhir')
<div class="row">
    {{-- <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}" method="post" enctype="multipart/form-data" id="eksport">
                {{ csrf_field() }}
                @if ($button == 'Edit'){{ method_field('PUT') }}

                @endif
                <div class="card-body">
                    @if ($button == 'Edit')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Nama Mahasiswa
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Nama Mahasiswa" id="name" name="name" value="@if ($button == 'Tambah'){{ old('nama') }}@else{{ $data_ta->mahasiswa->nama }}@endif" />
                        </div>
                    </div>
                    @endif
                    @if ($button == 'Tambah')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jurusan</label>
                        <div class="col-sm-9">
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
                        <label class="col-sm-3 col-form-label"> NIM</label>
                        <div class="col-sm-9">
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
                        <label class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" value="" readonly />
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Judul Tugas Akhir
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Judul Tugas Akhir" name="judulTA" value="@if ($button == 'Tambah'){{ old('judulTA') }}@else{{ $data_ta->judulTA }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Instansi / Lokasi Penelitian
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" required placeholder="Instansi / Lokasi Penelitian" name="instansi" value="@if ($button == 'Tambah'){{ old('instansi') }}@else{{ $data_ta->instansi }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Praporosal
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" placeholder="file praproposal" name="praproposal" value="@if ($button == 'Tambah'){{ old('praproposal') }}@else{{ $data_ta->praproposal }}@endif" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 1
                        </label>
                        <div class="col-sm-9">
                            <select name="pembimbing1_id" id="pembimbing1_id" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($dosen as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->pembimbing1_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Dosen Pembimbing 2
                        </label>
                        <div class="col-sm-9">
                            <select name="pembimbing2_id" id="pembimbing2_id" class="form-control">
                                <option value="">PILIH </option>
                                @foreach ($dosen as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->pembimbing2_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Tahun Akademik
                        </label>
                        <div class="col-sm-9">
                            <select name="tahunAkademik" id="tahunAkademik" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($tahunAkademik as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->thnAkad_id ? 'selected' : '' }}>{{ $value->namaTahun }} ({{ $value->semester->semester }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Status Pelaksanaan
                        </label>
                        <div class="col-sm-9">
                            <select name="status_id" id="status_id" class="form-control">
                                <option value="">PILIH</option>
                                @foreach ($status as $value )
                                <option value="{{ $value->id }}" {{ $value->id == $data_ta->status_id ? 'selected' : '' }}>{{ $value->ket}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">
                            Keterangan
                        </label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_ta->ket }}@endif</textarea>
                            <p class="text-muted"> * tidak wajib di isi</p>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/tugas-akhir/data-TA" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> {{ $button }}</button>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{$action}}" method="post" enctype="multipart/form-data" id="eksport">
                {{ csrf_field() }}
                @if ($button == 'Edit')
                {{ method_field('PUT') }}
                @endif
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            @if ($button == 'Edit')
                            <div class="form-group">
                                <label>
                                    Nama Mahasiswa
                                </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data_ta->mahasiswa->nama }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    NIM
                                </label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $data_ta->mahasiswa->nim }}" readonly />
                            </div>
                            <div class="form-group">
                                <label>
                                    Jurusan
                                </label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data_ta->mahasiswa->jurusan->namaJurusan }}" readonly />
                            </div>
                            @endif
                            @if ($button == 'Tambah')
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
                            @endif
                            <div class="form-group">
                                <label>
                                    Judul Tugas Akhir @if ($button == 'Tambah') <code>*</code>
                                    @endif
                                </label>
                                <input type="text" class="form-control" required placeholder="Judul Tugas Akhir" name="judulTA" value="@if ($button == 'Tambah'){{ old('judulTA') }}@else{{ $data_ta->judulTA }}@endif" />
                            </div>
                            <div class="form-group">
                                <label>
                                    Instansi / Lokasi Penelitian
                                </label>
                                <input type="text" class="form-control" placeholder="Instansi / Lokasi Penelitian" name="instansi" value="@if ($button == 'Tambah'){{ old('instansi') }}@else{{ $data_ta->instansi }}@endif" />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Praporosal @if ($button == 'Tambah') <code>*</code>
                                    @endif
                                </label>
                                <input type="file" class="form-control" placeholder="file praproposal" name="praproposal" value="@if ($button == 'Tambah'){{ old('praproposal') }}@else{{ $data_ta->praproposal }}@endif" />
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>
                                        Pembimbing 1 @if ($button == 'Tambah') <code>*</code>
                                        @endif
                                    </label>
                                    <div>
                                        <select name="pembimbing1_id" id="pembimbing1_id" class="form-control">
                                            <option value="">PILIH</option>
                                            @foreach ($dosen as $value )
                                            <option value="{{ $value->id }}" {{ $value->id == $data_ta->pembimbing1_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        Pembimbing 2 @if ($button == 'Tambah') <code>*</code>
                                        @endif
                                    </label>
                                    <div>
                                        <select name="pembimbing2_id" id="pembimbing2_id" class="form-control">
                                            <option value="">PILIH </option>
                                            @foreach ($dosen as $value )
                                            <option value="{{ $value->id }}" {{ $value->id == $data_ta->pembimbing2_id ? 'selected' : '' }}>{{ $value->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Tahun Akademik @if ($button == 'Tambah') <code>*</code>
                                    @endif
                                </label>
                                <select name="tahunAkademik" id="tahunAkademik" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($tahunAkademik as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_ta->thnAkad_id ? 'selected' : '' }}>{{ $value->namaTahun }} ({{ $value->semester->semester }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Status Pelaksanaan @if ($button == 'Tambah') <code>*</code>
                                    @endif
                                </label>
                                <select name="status_id" id="status_id" class="form-control">
                                    <option value="">PILIH</option>
                                    @foreach ($status as $value )
                                    <option value="{{ $value->id }}" {{ $value->id == $data_ta->status_id ? 'selected' : '' }}>{{ $value->ket}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Keterangan
                                </label>
                                <textarea type="text" class="form-control" placeholder="" name="ket">@if ($button == 'Tambah'){{ old('ket') }}@else{{ $data_ta->ket }}@endif</textarea>
                                <p class="text-muted"> * tidak wajib di isi</p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= url('') ?>/tugas-akhir/data-TA" type="button" class="btn btn-gradient-danger"><i class="mdi mdi-back"></i> Kembali</a>
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
           url:"{{ route('TA.nim') }}",
           data:{id:id},
           success:function(data){
               var nim = document.getElementById('nim')
                for (var i = 0; i < data.length; i++) {
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

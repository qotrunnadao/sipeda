@extends('mahasiswa.TA.layouts.main')
@section('icon', 'file')
@section('title', 'Pengajuan TA')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-primary">
            <form class="forms-sample" action="{{route('mahasiswaTA.store')}}" id = "creatData" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="status_id" name="status_id" value="2">
                <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="{{ $tahun->id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Judul Penelitian
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judulTA" id="judulTA" value="{{ old('judulTA') }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Lokasi/Instansi
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="instansi" id="instansi" value="{{ old('instansi') }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Pembimbing 1
                        </label>
                        <div class="col-sm-4">
                            <select type="text" id="pembimbing1_id" name="pembimbing1" class="form-control form-control-sm">
                                <option selected disabled> Pilih Dosen </option>
                                @foreach ($dosen as $value)
                                <option value="{{ $value->id }} ">{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label">
                            Pembimbing 2
                        </label>
                        <div class="col-sm-4">
                            <select type="text" id="pembimbing2_id" name="pembimbing2" class="form-control form-control-sm">
                                <option selected disabled>Pilih Dosen </option>
                                @foreach ($dosen as $value)
                                <option value="{{ $value->id }} ">{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            File Pra Proposal
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="praproposal" />
                        </div>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    @php ($no = 1)
    @foreach ($tugas_akhir as $value )
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Pengajuan TA {{ $no++ }}</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> Nama</td>
                                <td>:</td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                            </tr>
                            <tr>
                                <td> Diajukan Pada </td>
                                <td>:</td>
                                <td> {{ $value->created_at }} </td>
                            </tr>
                            <tr>
                                <td> Judul Penelitian </td>
                                <td>:</td>
                                <td> {{ $value->judulTA }} </td>
                            </tr>
                            <tr>
                                <td> Lokasi / Instansi</td>
                                <td>:</td>
                                <td> {{ $value->instansi }} </td>
                            </tr>
                            <tr>
                                <td> Dosen Pembimbing 1</td>
                                <td>:</td>
                                <td> {{ $value->dosen1->nama }} </td>
                            </tr>
                            <tr>
                                <td> Dosen Pembimbing 2</td>
                                <td>:</td>
                                <td> {{ $value->dosen2->nama }} </td>
                            </tr>
                            <tr>
                                <td> File Pra Proposal</td>
                                <td>:</td>
                                <td> {{ $value->praproposal }} </td>
                            </tr>
                            <tr>
                                <td> Status Pelaksanaan </td>
                                <td>:</td>
                                <td> {{ $value->status->ket}}</td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
                                <td>:</td>
                                <td> {{ $value->ket}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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

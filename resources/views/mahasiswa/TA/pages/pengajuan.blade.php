@extends('mahasiswa.TA.layouts.main')
@section('icon', 'file')
@section('title', 'Pengajuan Tugas Akhir')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin">
        <div class="card">
            <form class="forms-sample" action="{{route('mahasiswaTA.store')}}" id="creatData" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="status_id" name="status_id" value="2">
                <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="{{ $tahun->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Penelitian <code>*</code></label>
                        <input type="text" class="form-control" name="judulTA" id="judulTA" value="{{ old('judulTA') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Lokasi / Instansi Penelitian <code>(opsional)</code></label>
                        <input type="text" class="form-control" name="instansi" id="instansi" value="{{ old('instansi') }}">
                        <p class="text-muted">*jika tidak ada maka kosongi</p>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label>
                                Pembimbing 1 <code>*</code>
                            </label>
                            <div>
                                <select type="text" id="pembimbing1_id" name="pembimbing1" class="form-control" required>
                                    <option selected disabled> Pilih Dosen </option>
                                    @foreach ($dosen as $value)
                                    <option value="{{ $value->id }} ">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>
                                Pembimbing 2 <code>*</code>
                            </label>
                            <div>
                                <select type="text" id="pembimbing2_id" name="pembimbing2" class="form-control" required>
                                    <option selected disabled>Pilih Dosen </option>
                                    @foreach ($dosen as $value)
                                    <option value="{{ $value->id }} ">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Berkas Persyaratan <code>*</code>
                        </label>
                        <input type="file" class="form-control" name="praproposal" required />
                        @if ($errors->has('praproposal'))
                        <div class="text-danger">
                            {{ $errors->first('praproposal') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-primary card-img-holder text-white grid-margin">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Berkas Persayaratan Tugas Akhir
                </h4>
                <ul>
                    <li>Transkip Nilai Mahasiswa</li>
                    <li>Praproposal yang telah di acc calon Pembimbing I dan II</li>
                    <li>Melampirkan lembar permohonan Tugas Akhir</li>
                    <code>*Berkas dijadikan 1 file PDF</code>
                </ul>
            </div>
        </div>
        <div class="card bg-primary card-img-holder text-white grid-margin">
            <div class="card-body mb-3">
                <h4 class="font-weight-normal mb-3">File Unduhan
                </h4>
                <div class="table-responsive mt-3">
                    <div class="btn-group">
                        <form action="" method="post" target="blank">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-light download">Lembar Permohonan Tugas Akhir<i class="mdi mdi-download"></i></a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @php ($no = 1)
    @foreach ($tugas_akhir as $value )
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Pengajuan Tugas Akhir {{ $no++ }}</h4>
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
                                <td> @if($value->instansi == null)
                                    <span class="badge badge-danger">tidak ada lokasi penelitian</span>
                                    @else
                                    {{ $value->instansi }}
                                    @endif
                                </td>
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
                                <td> @if($value->ket == null)
                                    <span class="badge badge-danger">tidak ada keterangan</span>
                                    @else
                                    {{ $value->ket}}
                                    @endif
                                </td>
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

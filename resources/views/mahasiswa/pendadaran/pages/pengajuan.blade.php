@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'pengajuan pendadaran')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="{{route('mahasiswaPendadaran.store')}}" method="post" enctype="multipart/form-data" id="creatData">
                @csrf
                <input type="hidden" class="form-control" id="thnAkad_id" name="thnAkad_id" value="{{ $tahun->id }}">
                <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value="{{  $mhs_id->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            Berkas Persyaratan <code>*</code>
                        </label>
                        <input type="file" class="form-control" name="berkas" id="berkas" required />
                        @if ($errors->has('berkas'))
                        <div class="text-danger">
                            {{ $errors->first('berkas') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-primary card-img-holder text-white  card-hover">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Berkas Persyaratan Pendadaran
                </h4>
                <ul>
                    <li>Transkip Nilai</li>
                    <li>Hasil Tes Ujian UEPT</li>
                    <li>Bukti Distribusi Tugas Akhir</li>
                    <code>Berkas dijadikan 1 file PDF</code>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($pendadaran as $value )
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Data Pengajuan {{ $loop->iteration }}</h4>
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
                                <td> Berkas </td>
                                <td>:</td>
                                <td> {{ $value->berkas }} </td>
                            </tr>
                            <td> Status Pengajuan </td>
                            <td>:</td>
                            <td>
                                {{ $value->statusPendadaran->status}}
                            </td>
                            </tr>
                            <tr>
                                <td> Keterangan </td>
                                <td> : </td>
                                <td> @if($value->ket == null)
                                    <span class="badge badge-danger">tidak ada keterangan</span>
                                    @else
                                    {{ $value->ket }}
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

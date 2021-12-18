@extends('mahasiswa.TA.layouts.main')
@section('icon', 'comment-text')
@section('title', 'Seminar Hasil')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <form class="forms-sample" action="{{route('mahasiswaSemhas.store')}}" id="createData" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="status" name="status" value="0">
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                <div class="card-body">
                    <h4 class="card-title">Pengajuan Seminar Hasil</h4>
                    <p class="badge badge-danger mb-5">*pengajuan seminar maksimal dilakukan h-3 pelaksanaan</p>
                    <div class="form-group">
                        <label>Judul Penelitian <code>*</code></label>
                        <input class="form-control" name="judul" id="judul" type="text" autofocus required>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>
                                Tanggal Seminar <code>*</code>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" required />
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>
                                Ruang Seminar <code>*</code>
                            </label>
                            <div>
                                <select class="form-control" id="ruang" name="ruang" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                    @foreach ($Ruang as $value)
                                    <option value="{{ $value->id }} ">{{ $value->namaRuang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label>
                                Waktu Mulai <code>*</code>
                            </label>
                            <div class="input-group clockpicker">
                                <input type="text" id="jamMulai" name="jamMulai" class="form-control" placeholder="mulai" required>
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>
                                Waktu Selesai <code>*</code>
                            </label>
                            <div class="input-group clockpicker">
                                <input type="text" id="jamSelesai" name="jamSelesai" class="form-control" placeholder="selesai" required>
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            Berkas Persayaratan <code>*</code>
                        </label>
                        <input type="file" class="form-control" name="laporan" required />
                        @if ($errors->has('laporan'))
                        <div class="text-danger">
                            {{ $errors->first('laporan') }}
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
            <div class="card-body mb-3">
                <h4 class="font-weight-normal mb-3">Berkas Persyaratan Seminar Hasil
                </h4>
                <ul>
                    <li>Lembar pengesahan laporan tugas akhir yang telah di acc Pembimbing I dan II</li>
                    <li>Telah ikut seminar serupa min. 5X <br>
                        ( dengan menunjukan kartu seminar )</li>
                    <li>Melampirkan lembar permohonan seminar hasil yang telah di acc pembimbing I dan II</li>
                    <code>Berkas dijadikan 1 file PDF</code>
                </ul>
            </div>
        </div>
        <div class="card bg-primary card-img-holder text-white grid-margin">
            <div class="card-body mb-3">
                <h4 class="font-weight-normal mb-3">File Unduhan
                </h4>
                <div class="table-responsive mt-3">
                    <div class="btn-group">
                        <form action="{{ route('download.permohonanseminar') }}" method="post" target="blank">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-light download">Lembar Permohonan Seminar<i class="mdi mdi-download"></i></a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data Pengajuan Seminar Hasil</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th> # </th>
                                <th> Judul Penelitian </th>
                                <th> Tanggal </th>
                                <th> Waktu </th>
                                <th> Ruang </th>
                                <th> Status </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php($no=1)
                            @foreach ($SeminarHasil as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->TA->judulTA}} </td>
                                <td>
                                    {{ $value->tanggal }}
                                </td>
                                <td> {{ $value->jamMulai }} - {{$value->jamSelesai}}</td>
                                <td> {{ $value->ruang->namaRuang }}</td>
                                <td>
                                    @if($value->status == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                    @elseif($value->status == 1)
                                    <span class="badge badge-success">Disetujui</span>
                                    @else
                                    <span class="badge badge-danger">Tidak Disetujui</span>
                                    @endif
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
<script>
    $(document).ready(function () {

    $("#createData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection

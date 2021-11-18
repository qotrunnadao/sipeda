@extends('mahasiswa.TA.layouts.main')
@section('icon', 'comment-text')
@section('title', 'Seminar Proposal')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <form class="forms-sample" action="{{route('mahasiswaSempro.store')}}" method="post" id="createData" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="status" name="status" value="0">
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                <div class="card-body">
                    <h4 class="card-title">Pengajuan Seminar Proposal</h4>
                    <p class="text-danger mb-5">*pengajuan seminar maksimal dilakukan h-3 pelaksanaan!</p>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Judul Penelitian</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" maxlength="100" name="judul" id="judul" type="text" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label class="col-form-label">Tanggal Seminar</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal seminar" />
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div>
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
                        <div class="col-lg-3">
                            <label class="col-form-label">waktu</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" id="jamMulai" name="jamMulai" class="form-control" placeholder="mulai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group clockpicker">
                                <input type="text" id="jamSelesai" name="jamSelesai" class="form-control" placeholder="selesai">
                                <span class="input-group-text">
                                    <i class="mdi mdi-clock"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">
                            File Proposal
                        </label>
                        <div class="col-lg-8">
                            <input type="file" class="form-control" name="proposal" />
                        </div>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data Pengajuan Seminar</h4>
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
                            @foreach ($SeminarProposal as $value )
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

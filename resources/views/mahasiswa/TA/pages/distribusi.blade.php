@extends('mahasiswa.TA.layouts.main')
@section('title', 'Distribusi TA')
@section('icon', 'share-variant')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <form class="forms-sample" id="creatData" action="{{route('distribusi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            File Distribusi
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="fileDistribusi" />
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
                <h4 class="card-title mb-5">Data berkas distribusi</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> No. </th>
                                <th> Nama Dokumen </th>
                                <th> Tanggal Upload </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ( $distribusi as $value )
                            <tr>
                                <td class="text-center"> {{ $no ++ }} </td>
                                <div class="btn-group">
                                    <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" t arget="blank" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                    </form>
                                </div>
                                <td class="text-center"> {{ $value->created_at }} </td>
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

    $("#creatData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
@endsection

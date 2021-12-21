@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Cetak Draft Surat Kelulusan')
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card card-primary">
            <form action="" method="GET" enctype="multipart/form-data" id="creatData">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Periode Yudisium <code>*</code></label>
                        <select type="text" class="form-control" id="periode_id" name="periode_id" required>
                            <option selected disabled>Pilih Periode </option>
                            @foreach ($periode as $value)
                            <option value="{{ $value->id }} ">{{ $value->namaPeriode }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="fa fa-print"></i> Cetak SK</button> --}}
                    <a href="" onclick="this.href='/yudisium/sk-yudisium/laporan/' + document.getElementById('periode_id').value" target="_blank" id="btnSubmit" class="btn btn-gradient-primary "><i class="fa fa-print"></i>
                        Cetak SK</a>
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

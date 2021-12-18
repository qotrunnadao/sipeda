@extends('mahasiswa.TA.layouts.main')
@section('title', 'Distribusi Tugas Akhir')
@section('icon', 'share-variant')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <form class="forms-sample" id="creatData" action="{{route('distribusi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>
                            File Distribusi <code>*</code>
                        </label>
                        <input type="file" class="form-control" name="fileDistribusi" required />
                        @if ($errors->has('fileDistribusi'))
                        <div class="text-danger">
                            {{ $errors->first('fileDistribusi') }}
                        </div>
                        @endif
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-primary card-img-holder text-white">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">File Unduhan
                </h4>
                <div class="table-responsive mt-3">
                    <div class="btn-group">
                        <div class="btn-group">
                            <form action="{{ route('download.formdistribusi') }}" method="post" target="blank">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-light download">Contoh Form Distribusi Tugas Akhir<i class="mdi mdi-download"></i></a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
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
                                <td class="text-center">
                                    <div class="btn-group">
                                        @if (File::exists(public_path('storage/assets/file/fileDistribusiTA/' . $value->fileDistribusi . '')))
                                        <div class="btn-group">
                                            <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" method="post" target="blank">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="btn-group">
                                            <form action="{{ route('distribusi.download', $value->fileDistribusi) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->fileDistribusi }} <i class="mdi mdi-download"></i></a></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
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

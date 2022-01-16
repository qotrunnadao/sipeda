@extends('layouts.main')
@section('content')
@section('icon', 'message-text')
@section('title', 'Berita Studi Akhir')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-sm btn-gradient-primary float-right" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
                </div>
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr class="text-center">
                                <th> No. </th>
                                <th> Nama Persyaratan </th>
                                <th> Berkas </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($berkas as $value)
                            <tr class="text-center">
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->nama_berkas }}</td>
                                <td>
                                    @if (File::exists(public_path('storage/assets/file/Berkas Persyaratan/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('download.persyaratan', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('download.persyaratan', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata{{ $value['id'] }}" ><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('berkas.delete', $value->id) }}" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambah berkas -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Berkas Persyaratan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('berkas.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Nama Berkas Persyaratan <code>*</code></label>
                            <select type="text" class="form-control" name="nama_berkas" required>
                                <option value="" selected disabled>PILIH</option>
                                <option value="Tugas Akhir" >Tugas Akhir</option>
                                <option value="Seminar Proposal" >Seminar Proposal</option>
                                <option value="Seminar Hasil" >Seminar Hasil</option>
                                <option value="Pendadaran" >Pendadaran</option>
                                <option value="Yudisium" >Yudisium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Berkas Persyaratan <code>*</code></label>
                            <input type="file" class="form-control" name="berkas" />
                            @if ($errors->has('berkas'))
                            <div class="text-danger">
                                {{ $errors->first('berkas') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($berkas as $value)
<!-- Edit Berkas -->
<div class="modal fade" id="editdata{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Berkas Persyaratan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" id="editData" action="{{ route('berkas.update', $value->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Nama Berkas Persyaratan <code>*</code></label>
                            <select type="text" class="form-control" name="nama_berkas" required>
                                <option value="" selected disabled>PILIH</option>
                                <option value="Tugas Akhir" {{ "Tugas Akhir"==$value->nama_berkas ? 'selected' : '' }}>Tugas Akhir</option>
                                <option value="Seminar Proposal" {{ "Seminar Proposal"==$value->nama_berkas ? 'selected' : '' }}>Seminar Proposal</option>
                                <option value="Seminar Hasil" {{ "Seminar Hasil"==$value->nama_berkas ? 'selected' : '' }}>Seminar Hasil</option>
                                <option value="Pendadaran" {{ "Pendadaran"==$value->nama_berkas ? 'selected' : '' }}>Pendadaran</option>
                                <option value="Yudisium" {{ "Yudisium"==$value->nama_berkas ? 'selected' : '' }}>Yudisium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Berkas Persyaratan </label>
                            <input type="file" class="form-control" name="berkas" />
                            @if ($errors->has('berkas'))
                            <div class="text-danger">
                                {{ $errors->first('berkas') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
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
@endsection

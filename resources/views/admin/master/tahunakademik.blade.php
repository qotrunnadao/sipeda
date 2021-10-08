@extends('admin.layouts.main')
@section('content')
@section('icon', 'calendar')
@section('title', 'Tahun Akademik')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Tahun </th>
                                <th> Semester </th>
                                <th> Aktif </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php ($no = 1)
                            @foreach ($tahun_akademik as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->namaTahun }}</td>
                                <td> {{ $value->Semester->semester }} </td>
                                <td> {{ $value->aktif == 0 ? 'false' : 'true'}} </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata"
                                         data-namatahun='{{ $value->namaTahun }}'
                                         data-semester='{{ $value->Semester->id }}' data-aktif='{{ $value->aktif}}' data-route="{{ route('tahunAkademik.update', $value->id) }}"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('tahunAkademik.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
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

<!-- Tambah Tahun Akademik -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('tahunAkademik.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Tahun</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="namaTahun" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Semester</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="semester_id">
                                <option value="">PILIH</option>
                                @foreach ($semester as $value)
                                <option value="{{ $value->id }}">{{ $value->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Aktif</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="aktif">
                                <option value="">PILIH</option>
                                @foreach ($tahun_akademik as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->aktif ? 'selected' : '' }}>{{ $value->aktif }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Tahun Akademik --}}
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @foreach ($jurusan as $value ) --}}
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Tahun</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="tahunakademik" name="namaTahun" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Semester</label>
                        <div class="input-group">
                            <select type="text" class="form-control" id="semester" name="semester_id">
                                <option value="">PILIH</option>
                                @foreach ($semester as $value)
                                <option value="{{ $value->id }}">{{ $value->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Aktif</label>
                        <div class="input-group">
                            <select type="text" class="form-control" id="aktif1" name="aktif">
                                <option value="">PILIH</option>
                                @foreach ($tahun_akademik as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->aktif ? 'selected' : '' }}>{{ $value->aktif }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var route = button.data('route')
        var namaTahun = button.data('namatahun') // Extract info from data-* attributes
        var semester = button.data('semester') // Extract info from data-* attributes
        var aktif = button.data('aktif') // Extract info from data-* attributes

        var modal = $(this)


        modal.find(".modal-body input[name='namaTahun']").val(namaTahun)
        modal.find(".modal-body select[name='semester_id']").val(semester)
        modal.find(".modal-body select[name='aktif']").val(aktif)
        modal.find(".modal-body form").attr("action",route)
    })
</script>
@endsection

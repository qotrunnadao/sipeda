@extends('admin.layouts.main')
@section('content')
@section('icon', 'trophy')
@section('title', 'Upload Nilai TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <button type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4" data-toggle="modal" data-target="#tambahdata"> <i class="mdi mdi-plus"></i> Tambah</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM </th>
                                <th> Jurusan </th>
                                <th> Nilai Angka </th>
                                <th> Nilai Huruf </th>
                                <th> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($nilai as $value )
                            <tr>
                                <td class="text-center"> {{ $no++ }} </td>
                                <td class="text-center"> {{ $namaMahasiswa }} </td>
                                <td class="text-center"> {{ $nim }}</td>
                                <td class="text-center"> {{ $namaJurusan }}</td>
                                <td class="text-center"> {{ $value->nilaiAngka }}</td>
                                <td class="text-center"> {{ $value->nilaiHuruf }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('nilaita.update', $value->id) }}" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-ta_id='{{ $value->ta_id }}' data-nilaiAngka='{{ $value->nilaiAngka }}' data-nilaiHuruf='{{ $value->nilaiHuruf }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('nilaita.destroy', $value->id) }}" method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
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

<!-- Tambah Jurusan -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('nilaita.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">ID TA</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="ta_id">
                                <option value="">PILIH</option>
                                @foreach ($nilai as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->ta_id ? 'selected' : '' }}>{{ $value->ta_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Angka</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiAngka" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Huruf</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiHuruf" />
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

<!--edit Jurusan -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">ID TA</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="ta_id" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Angka</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiAngka" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nilai Huruf</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nilaiHuruf" />
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
@endsection
@section('javascripts')
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var ta_id = button.data('ta_id')
    var nilaiAngka = button.data('nilaiAngka')
    var nilaiHuruf = button.data('nilaiHuruf')
    var modal = $(this)
    {{-- modal.find('.modal-title').text('New message to ' + recipient) --}}
    modal.find(".modal-body input[name='ta_id']").val(ta_id)
    modal.find(".modal-body input[name='nilaiAngka']").val(nilaiAngka)
    modal.find(".modal-body input[name='nilaiHuruf']").val(nilaiHuruf)
    modal.find(".modal-body form").attr("action",'/tugas-akhir/nilaita/update/'+id)
    })
</script>
@endsection

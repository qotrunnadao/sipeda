@extends('mahasiswa.TA.layouts.main')
@section('icon', 'account-multiple')
@section('title', 'Konsultasi TA')
@section('content')

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
                                <th> No. </th>
                                <th> Tanggal Konsul </th>
                                <th> Nama Pembimbing </th>
                                <th> Terverivikasi </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($konsultasi as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->tanggal }}</td>
                                <td> {{ $value->dosen->nama }}</td>
                                <td> @if  ($value->verifikasiDosen =='0')
                                    <span class="badge badge-danger"> False</span>
                                    @elseif ($value->verifikasiDosen == '1')
                                    <span class="badge badge-success"> True</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('mahasiswaKonsultasi.show', $value->id)}}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-warning btn-sm" data-toggle="modal" data-target="#editdata"
                                        data-dosen_id='{{ $value->dosen->nama }}' data-tanggal='{{ $value->tanggal }}' data-topik='{{ $value->topik}}'
                                         data-hasil='{{ $value->hasil}}' data-verifikasiDosen='{{ $value->verifikasiDosen}}'
                                         data-route="{{ route('mahasiswaKonsultasi.update', $value->id) }}"><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete-forever"></i></button>
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

<!-- Modal Tembah Data Konsultasi -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="{{route('mahasiswaKonsultasi.store')}}" method="post">
                    @csrf
                    <input type="hidden" class="form-control" id="verifikasiDosen" name="verifikasiDosen" value="0">
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                    <div class="form-group">
                        <label for="exampleSelectGender">Nama Pembimbing</label>
                        <select class="form-control" id="exampleSelectGender"  name="dosen_id">
                            <option selected disabled> Pilih Dosen </option>
                            {{-- @foreach ($tugas_akhir as $value) --}}
                            <option value="{{ $tugas_akhir->pembimbing1_id }}">{{ $tugas_akhir->dosen1->nama }}</option>
                            <option value="{{ $tugas_akhir->pembimbing2_id }}">{{ $tugas_akhir->dosen2->nama }}</option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Tanggal Konsultasi</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal" id="tanggal" placeholder="Tanggal Konsultasi" />
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Topik Konsultasi</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="topik" id="topik" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alasan">Hasil Konsultasi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="hasil"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Konsultasi --}}
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
                        <label for="exampleInputEmail3">Status</label>
                        <div class="input-group">
                            <select type="text" class="form-control" id="aktif1" name="aktif">
                                <option value="">PILIH</option>
                                <option value=""selected disabled>PILIH</option>
                                <option value="1">True</option>
                                <option value="0">False</option>
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


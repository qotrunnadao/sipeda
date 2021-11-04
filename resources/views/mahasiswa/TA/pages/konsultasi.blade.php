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
                                <th> Terverifikasi </th>
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
                                <td> @if ($value->verifikasiDosen =='0')
                                    <span class="badge badge-danger"> False</span>
                                    @elseif ($value->verifikasiDosen == '1')
                                    <span class="badge badge-success"> True</span>
                                </td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-dosen_id='{{ $value->dosen->id }}' data-tanggal='{{ $value->tanggal }}' data-topik='{{ $value->topik}}' data-hasil='{{ $value->hasil}}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('mahasiswaKonsultasi.delete', $value->id) }}" method="GET">
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

<!-- Modal Tambah Data Konsultasi -->
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
                        <select class="form-control" id="exampleSelectGender" name="dosen_id">
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

{{-- Modal Edit Data Konsultasi --}}
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{ $tugas_akhir->id }}">
                    <div class="form-group">
                        <label>Nama Pembimbing</label>
                        <select class="form-control" id="dosen_id" name="dosen_id">
                            <option value="{{ $tugas_akhir->pembimbing1_id }}">{{ $tugas_akhir->dosen1->nama }}</option>
                            <option value="{{ $tugas_akhir->pembimbing2_id }}">{{ $tugas_akhir->dosen2->nama }}</option>
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
                        <div class="input-group">
                            <textarea class="form-control" rows="4" name="hasil" id="hasil"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary"><i class="mdi mdi-content-save"></i> Edit </button>
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
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var dosen_id = button.data('dosen_id') // Extract info from data-* attributes
    var tanggal = button.data('tanggal') // Extract info from data-* attributes
    var topik = button.data('topik')
    var hasil = button.data('hasil')
    var modal = $(this)

    modal.find(".modal-body select[name='dosen_id']").val(dosen_id)
    modal.find(".modal-body input[name='tanggal']").val(tanggal)
    modal.find(".modal-body input[name='topik']").val(topik)
    modal.find(".modal-body textarea[name='hasil']").val(hasil)
    modal.find(".modal-body form").attr("action",'/mahasiswa/tugas-akhir/konsultasi/update/'+id)
    })
</script>
@endsection

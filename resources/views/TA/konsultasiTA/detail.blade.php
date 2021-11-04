@extends('layouts.main')
@section('content')
@section('icon', 'account-multiple')
@section('title', 'Detail Konsultasi Mahasiswa TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div>
                <a href="{{ route('konsultasi.index') }}" type="button" class="btn btn-sm btn-gradient-primary mt-4 ml-4">Kembali</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Tanggal </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($konsultasi as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->TA->mahasiswa->nama }}</td>
                                <td> {{ $value->tanggal }}</td>
                                <td>
                                    @if($value->verifikasiDosen == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                </td>
                                @elseif($value->verifikasiDosen == 1)
                                <span class="badge badge-success">diterima</span></td>
                                @else
                                <span class="badge badge-danger">ditolak</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#hasilkonsultasi" data-topik='{{ $value->topik }}' data-hasil='{{ $value->hasil }}'><i class="mdi mdi-information"></i></a>
                                    </div>
                                    @if($value->verifikasiDosen == 0)
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="fa fa-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm"><i class="fa fa-times"></i></a>
                                    </div>
                                    @elseif($value->verifikasiDosen == 1)

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

<!-- Modal -->
<div class="modal fade" id="hasilkonsultasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail3">Topik Konsultasi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="topik" id="topik" value="" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Hasil Konsultasi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="hasil" id="hasil" value="" readonly />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('javascripts')
<script>
    $('#hasilkonsultasi').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        // var route = button.data('route')
        var topik = button.data('topik') // Extract info from data-* attributes
        var hasil = button.data('hasil') // Extract info from data-* attributes

        var modal = $(this)


        modal.find(".modal-body input[name='topik']").val(topik)
        modal.find(".modal-body input[name='hasil']").val(aktif)
        // modal.find(".modal-body form").attr("action",route)
    })
</script>
@endsection

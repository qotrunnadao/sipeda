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
                            {{-- @foreach ($konsultasi as $value ) --}}
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $konsultasi->ta->mahasiswa->nama }}</td>
                                <td> {{ $konsultasi->tanggal }}</td>
                                <td>
                                    @if($konsultasi->verifikasiDosen == 0)
                                    <span class="badge badge-warning">menunggu</span>
                                </td>
                                @elseif($konsultasi->verifikasiDosen == 1)
                                <span class="badge badge-success">diterima</span></td>
                                @else
                                <span class="badge badge-danger">ditolak</span></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#hasilkonsultasi"><i class="mdi mdi-information"></i></a>
                                    </div>
                                    @if($konsultasi->verifikasiDosen == 0)
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.diterima', $konsultasi->id) }}" class="btn btn-gradient-success btn-sm"><i class="fa fa-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('konsultasi.ditolak', $konsultasi->id) }}" class="btn btn-gradient-danger btn-sm"><i class="fa fa-times"></i></a>
                                    </div>
                                    @elseif($konsultasi->verifikasiDosen == 1)

                                    @endif
                                </td>
                            </tr>
                            {{-- @endforeach --}}
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
                        <input type="text" class="form-control" name="topik" id="name" value="{{ $konsultasi->topik }}" readonly />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Hasil Konsultasi</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="hasil" value="{{ $konsultasi->hasil }}" readonly />
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

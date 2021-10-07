@extends('admin.layouts.main')
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
                                <th> Topik</th>
                                <th> Hasil Konsultasi </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            {{-- @foreach ($konsultasi as $value ) --}}
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $konsultasi->mhs_id }}</td>
                                <td> {{ $konsultasi->tanggal }}</td>
                                <td> {{ $konsultasi->topik }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#hasilkonsultasi"><i class="mdi mdi-information"></i></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-warning badge-pill">{{ $konsultasi->status }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-close"></i></button>
                                        </form>
                                    </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Hasil Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ $konsultasi->hasil }}</p>
            </div>

        </div>
    </div>
</div>
@endsection

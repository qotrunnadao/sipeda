@extends('layouts.main')
@section('content')
@section('icon', 'file')
@section('title', 'Pengajuan TA')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('TA.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> Jurusan</th>
                                <th> Judul </th>
                                <th> Dosen Pembimbing 1</th>
                                <th> Dosen Pembimbing 2</th>
                                <th> Praproposal </th>
                                <th> Status</th>
                                <th> Keterangan </th>
                                @if(auth()->user()->level_id == 2 && 1)
                                <th> Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($tugas_akhir as $value )
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                <td> {{ $value->judulTA }}</td>
                                <td> {{ $value->dosen1->nama }}</td>
                                <td> {{ $value->dosen2->nama }}</td>
                                <td> {{ $value->praproposal }}</td>
                                <td> <span class="badge badge-primary">{{ $value->status->ket}} </span>
                                </td>
                                <td> {{ $value->keterangan }}</td>
                                <td>
                                    @if (auth()->user()->level_id == 2)
                                    <div class="btn-group">
                                        <a href="{{ route('TA.diterimaBapendik', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <div data-toggle="modal" data-target="#tambahdata">
                                            <a href="" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <form action="#" method="GET">
                                            <button type="submit" class="btn btn-gradient-danger btn-sm hapus"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                    @if (auth()->user()->level_id == 1)
                                    <div class="btn-group">
                                        <a href="{{ route('TA.edit', $value->id) }}" class="btn btn-gradient-primary btn-sm"><i class="mdi mdi-information"></i></a>
                                    </div>
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

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="{{ route('TA.update', $value->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="tidak disetujui" name="status_id" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" placeholder="{{ old('ket') }}" name="ket"></textarea>
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

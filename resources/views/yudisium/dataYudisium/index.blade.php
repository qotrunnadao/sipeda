@extends('layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Pengajuan Yudisium')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM</th>
                                <th> Jurusan</th>
                                <th> Berkas Persyaratan </th>
                                <th> status </th>
                                <th> IPK</th>
                                <th> SKS</th>
                                <th> Periode Yudisium</th>
                                <th> Keterangan </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($acc_yudisium as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }}</td>
                                <td> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                <td>
                                    @if($value->berkas != null)
                                    @if (File::exists(public_path('storage/assets/file/Yudisium/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else

                                    <div class="badge badge-danger badge-pill ">Berkas Yudisium Tidak Ada</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-danger">{{ $value->statusyudisium->status}}</span>

                                </td>
                                <td>
                                    @if ($value->akademik->ipk==null)
                                    <span class="badge badge-danger">Data IPK belum terbit</span>
                                    @else
                                    {{ $value->akademik->ipk }}
                                    @endif
                                </td>
                                <td>
                                    @if ($value->akademik->sks == null)
                                    <span class="badge badge-danger">Data SKS belum terbit</span>
                                    @else
                                    {{ $value->akademik->sks }}
                                    @endif
                                </td>
                                <td>
                                    @if ($value->periode_id)
                                    {{ $value->periodeyudisium->namaPeriode }}
                                    @else
                                    <span class="badge badge-danger">Data Periode Belum Terbit</span>
                                    @endif
                                </td>
                                <td>
                                    @if($value->ket == null)
                                    <span class="badge badge-danger">Tidak ada keterangan</span>
                                    @else
                                    {{ $value->ket }}
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->level_id == 5 && $value->status_id ==2)
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    @elseif (auth()->user()->level_id == 2 )
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-status_id='{{ $value->status_id }}' data-periode_id='{{ $value->periode_id }}' data-ket='{{ $value->ket }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.delete', $value->id)}}" method="GET">
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
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if(auth()->user()->level_id == 2)
                <div>
                    <a href="{{ route('yudisium.create') }}" type="button" class="btn btn-sm btn-gradient-primary float-right"> <i class="mdi mdi-plus"></i> Tambah</a>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama Mahasiswa </th>
                                <th> NIM</th>
                                <th> Jurusan</th>
                                <th> Berkas Persyaratan </th>
                                <th> status </th>
                                <th>IPK</th>
                                <th>SKS</th>
                                <th> Periode Yudisium</th>
                                <th> Transkip Nilai </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach ($yudisium as $value)
                            <tr>
                                <td> {{ $no++ }} </td>
                                <td> {{ $value->mahasiswa->nama }} </td>
                                <td> {{ $value->mahasiswa->nim }}</td>
                                <td> {{ $value->mahasiswa->jurusan->namaJurusan }}</td>
                                <td>
                                    @if($value->berkas != null)
                                    @if (File::exists(public_path('storage/assets/file/Yudisium/' . $value->berkas . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.download', $value->berkas) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->berkas }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    <div class="badge badge-danger badge-pill ">Berkas Yudisium Tidak Ada</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-danger">{{ $value->statusyudisium->status}}</span>

                                </td>
                                <td>
                                    @if ($value->mahasiswa->ipk)
                                    {{ $value->mahasiswa->ipk }}
                                    @else
                                    <span class="badge badge-danger">Data IPK belum terbit</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->mahasiswa->sks)
                                    {{ $value->mahasiswa->sks }}
                                    @else
                                    <span class="badge badge-danger">Data SKS belum terbit</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->periode_id)
                                    {{ $value->periodeyudisium->namaPeriode }}
                                    @else
                                    <span class="badge badge-danger">Data Periode Belum Terbit</span>
                                    @endif
                                </td>

                                <td>
                                    @if($value->transkipNilai != null)
                                    @if (File::exists(public_path('storage/assets/file/Transkip Nilai/' . $value->transkipNilai . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.transkip', $value->transkipNilai) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->transkipNilai }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.transkip', $value->transkipNilai) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->transkipNilai }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    <div class="badge badge-danger badge-pill ">Berkas Yudisium Tidak Ada</div>
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->level_id == 5 && $value->status_id ==2)
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.diterima', $value->id) }}" class="btn btn-gradient-success btn-sm"><i class="mdi mdi-check"></i></a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('yudisium.ditolak', $value->id) }}" class="btn btn-gradient-danger btn-sm "><i class="mdi mdi-close"></i></a>
                                    </div>
                                    @elseif (auth()->user()->level_id == 2 )
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata" data-id='{{ $value->id }}' data-status_id='{{ $value->status_id }}' data-transkipNilai='{{ $value->transkipNilai }}' data-periode_id='{{ $value->periode_id }}' data-sks='{{ $value->mahasiswa->sks }} data-ipk=' {{ $value->mahasiswa->ipk }} data-ket='{{ $value->ket }}'><i class="mdi mdi-border-color"></i></a>
                                    </div>
                                    @endif
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.delete', $value->id)}}" method="GET">
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

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Yudisium</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status Yudisium</label>
                        <div class="input-group">
                            <select type="text" class="form-control" name="status_id">
                                <option value="" selected disabled>PILIH</option>
                                @foreach ($status as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->status ? 'selected' : '' }}>{{ $value->status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Periode Yudisium</label>
                        <div class="input-group">
                            <select type="text" required class="form-control" name="periode_id">
                                <option value="" selected disabled>PILIH</option>
                                @foreach ($periode as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $value->namaPeriode ? 'selected' : '' }}>{{ $value->namaPeriode }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Transkip Nilai Mahasiswa
                        </label>
                        <input type="file" class="form-control" placeholder="transkip nilai" name="transkipNilai" />
                        @if ($errors->has('transkipNilai'))
                        <div class="text-danger">
                            {{ $errors->first('transkipNilai') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">IPK</label>
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ipk" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">SKS</label>
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="sks" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Keterangan</label>
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ket" />
                            </div>
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
@endsection
@section('javascripts')
<script>
    $(document).ready(function () {

    $("#editData").submit(function () {

        $("#btnSubmit").attr("disabled", true);

        return true;

    });
});
</script>
<script>
    $('#editdata').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var status_id = button.data('status_id')
    var transkip = button.data('transkipNilai')
    var periode_id = button.data('periode_id')
    var sks = button.data('sks')
    var ipk = button.data('ipk')
    var ket = button.data('ket')
    var modal = $(this)

    modal.find(".modal-body select[name='status_id']").val(status_id)
    modal.find(".modal-body input[name='transkipNilai']").val(transkip)
    modal.find(".modal-body select[name='periode_id']").val(periode_id)
    modal.find(".modal-body select[name='sks']").val(sks)
    modal.find(".modal-body select[name='ipk']").val(ipk)
    modal.find(".modal-body select[name='ket']").val(ket)
    modal.find(".modal-body form").attr("action",'/yudisium/data-yudisium/update/'+id)
    })
</script>
@endsection
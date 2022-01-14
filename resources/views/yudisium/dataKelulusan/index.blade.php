@extends('layouts.main')
@section('content')
@section('icon', 'clipboard-account')
@section('title', 'Data Kelulusan')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="buttondatatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> NO URUT </th>
                                <th> NAMA </th>
                                <th> NIM</th>
                                <th> L/P</th>
                                <th> TEMPAT/TGL LAHIR </th>
                                <th> TGL MASUK UNSOED </th>
                                <th> ANGKATAN TAHUN</th>
                                <th> NO ALUMNI</th>
                                <th> TANGGAL PENDADARAN</th>
                                <th> TANGGAL YUDISIUM (LULUS)</th>
                                <th> PROGRAM STUDI</th>
                                <th> TOTAL SKS</th>
                                <th> IPK</th>
                                <th> LAMA STUDI</th>
                                <th> PREDIKAT</th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelulusan as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->mahasiswa->nama }}</td>
                                <td>{{ $value->mahasiswa->nim }}</td>
                                <td>{{ $value->mahasiswa->jenkel->ket }}</td>
                                <td>
                                    @if($value->mahasiswa->tglLahir)
                                    {{ $value->mahasiswa->tmptLahir }}/{{ $value->mahasiswa->tglLahir }}
                                     @else
                                     {{ $value->mahasiswa->tmptLahir }}
                                    @endif
                                </td>
                                    @if ($value->tanggal_masuk == null)
                                    <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data Tanggal Masuk</div></td>
                                    @else
                                    <td>{{ $value->tanggal_masuk }}</td>
                                    @endif
                                <td>{{ $value->mahasiswa->angkatan }}</td>
                                @if ($value->no_alumni != null)
                                <td>{{ $value->no_alumni }}</td>
                                @else
                                <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data Nomer Alumni</div></td>
                                @endif
                                @if ($value->akademik->pendadaran != null)
                                <td>{{ $value->akademik->pendadaran->tanggal }}</td>
                                @else
                                <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data Pendadaran</div></td>
                                @endif
                                @if ($value->akademik->Yudisium != null)
                                <td>{{ $value->akademik->Yudisium->periodeYudisium->tanggal }}</td>
                                @else
                               <td> <div class="badge badge-danger badge-pill ">Belum Mengajukan Data Yudisium</div></td>
                                @endif
                                <td>{{ $value->mahasiswa->Jurusan->namaJurusan }}</td>
                                @if ($value->mahasiswa->sks == Null)
                                <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data SKS</div></td>
                                @else
                                <td>{{ $value->mahasiswa->sks }}</td>
                                @endif
                                @if ($value->mahasiswa->sks == Null)
                                <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data SKS</div></td>
                                @else
                                <td>{{ $value->mahasiswa->sks }}</td>
                                @endif
                                @if ($value->lama_studi != null)
                                <td>{{ $value->lama_studi }}</td>
                                @else
                               <td><div class="badge badge-danger badge-pill ">Belum Tersedia Data Lama Studi</div></td>
                                @endif
                                @if ($value->predikat != null)
                                <td>{{ $value->predikat }}</td>
                                @else
                               <td><div class="badge badge-danger badge-pill ">Belum Mengajukan Data Predikat Kelulusan</div></td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editdata{{ $value['id'] }}"><i class="mdi mdi-border-color"></i></a>
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
@foreach ($kelulusan as $value)
<div class="modal fade" id="editdata{{ $value['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelengkapan data kelulusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" id="editData" action="{{ route('kelulusan.update', $value->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Tanggal Masuk Unsoed <code>*</code></label>
                            <div class="input-group">
                                    <input type="text" value="{{ $value->tanggal_masuk }}" class="form-control datepicker" data-language="en" data-date-format="yyyy-mm-dd" name="tanggal_masuk" id="tanggal_masuk" value="" />
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Nomor Alumni <code>*</code></label>
                            <input type="text" value="{{ $value->no_alumni }}" class="form-control" name="no_alumni" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Predikat <code>*</code></label>
                            <select type="text" class="form-control" name="predikat" required>
                                <option value="">PILIH</option>
                                <option value="DP"{{ "DP"==$value->predikat ? 'selected' : '' }}>Dengan Pujian</option>
                                <option value="SM"{{ "SM"==$value->predikat ? 'selected' : '' }}>Sangat Memuaskan</option>
                                <option value="M"{{ "M"==$value->predikat ? 'selected' : '' }}>Memuaskan</option>
                            </select>
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

@extends('mahasiswa.TA.layouts.main')
@section('icon', 'home')
@section('title', 'Beranda')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left" src="{{ asset('sitak/assets/images/hello.svg') }}" alt="" style="width: 250px">
                <h1 class="card-title text-white text-center mt-5">Selamat Datang, {{$mhs_id->nama }}!</h1>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom text-center pb-4">
                    @if (Auth::user()->foto)
                    <img src="{{ $mhs_id->foto }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @else
                    <img src="{{ asset('sitak/assets/images/profile.jpg') }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @endif
                    <div class="d-flex justify-content-center">
                        <div class="badge badge-gradient-primary">{{$mhs_id->nama}}</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi TA Anda</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> IP Terakhir </td>
                                <td>:</td>
                                <td> 3,93 </td>
                            </tr>
                            <tr>
                                <td> IPK </td>
                                <td>:</td>
                                <td> 3,84 </td>
                            </tr>
                            <tr>
                                <td> Total SKS </td>
                                <td>:</td>
                                <td> 138 </td>
                            </tr>
                            <tr>
                                <td> Judul Penelitian </td>
                                <td>:</td>
                                <td>
                                    @if ($TA == null)
                                    <span class="badge badge-danger">Belum mengajukan Tugas Akhir</span>
                                    @else
                                    {{ $TA->judulTA }}
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> Lokasi </td>
                                <td>:</td>
                                @if ($TA == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Tugas Akhir</span>
                                </td>
                                @else
                                <td> {{ $TA->instansi }}
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> SPK Disahkan </td>
                                <td>:</td>
                                @if ($spk == null)
                                <td>
                                    <span class="badge badge-primary">SPK Tugas Akhir Belum Terbit</span>
                                </td>
                                @else
                                <td> {{ $sah }} </td>
                                @endif
                            </tr>
                            <tr>
                                <td> SPK diambil </td>
                                <td>:</td>
                                <td> 26/10/2000 </td>
                            </tr>
                            <tr>
                                <td> SPK Berakhir </td>
                                <td>:</td>
                                <td> {{$expired}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Tahapan TA</h4>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column todo-list todo-list-custom">
                        @foreach ($status as $value)
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" value="{{ $value->id }} " {{ $loop->iteration <= $TA->status_id && $loop->iteration != 1 || $TA->status_id == 1 && $loop->iteration == $TA->status_id ? 'checked' : '' }}> {{ $value->ket }} <i class="input-helper"></i></label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Status Pelaksanaan Studi Akhir</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th> Status Tugas Akhir </th>
                                {{-- <th> Status Pendadaran </th>
                                <th> Status Yudisium </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> {{$mhs_id->nama }} </td>
                                <td>
                                    @if($TA == null)
                                    <div class="badge badge-danger badge-pill">
                                        Belum mengajukan Tugas Akhir
                                    </div>
                                    @else
                                    <div class="badge badge-primary badge-pill">
                                        {{ $TA->status->ket }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    {{-- <div class="badge badge-danger badge-pill"> --}}
                                        {{-- @if($pendadaran == null)
                                        belum mengajukan
                                        @else
                                        {{ $pendadaran->StatusPendadaran->id }}
                                        @endif --}}
                                    </div>
                                </td>
                                <td>
                                    {{-- <div class="badge badge-danger badge-pill"> --}}
                                        {{-- @if($yudisium == null)
                                        belum mengajukan
                                        @else
                                        {{ $yudisium->StatusYudisium->id }}
                                        @endif --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">File Unduhan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            @if($TA == null)
                            <tr>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum mengajukan Tugas Akhir</div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    @if($TA->status_id >=5)
                                    <div class="btn-group">
                                        <form action="{{ route('download.spk', $spk->fileSPK) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    SPK Tugas Akhir
                                    <div class="badge badge-primary badge-pill float-right">Belum Terbit</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if($TA->status_id >=7)
                                    <div class="btn-group">
                                        <form action="{{ route('download.semprop', $semprop->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semprop->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    Berita Acara Seminar Proposal
                                    <div class="badge badge-primary badge-pill float-right">Belum Terbit</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if($TA->status_id >=9)
                                    <div class="btn-group">
                                        <form action="{{ route('download.semhas', $semhas->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semhas->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    Berita Acara Seminar Hasil
                                    <div class="badge badge-primary badge-pill float-right">Belum Terbit</div>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

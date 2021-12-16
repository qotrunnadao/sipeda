@extends('mahasiswa.pendadaran.layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'beranda mahasiswa')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card bg-gradient-primary">
            <div class="card-body">
                <img class="float-left img-start img-hover" src="{{ asset('sitak/assets/images/welcome.svg') }}" alt="" style="width: 200px;">
                <h1 class="card-title text-white text-center mt-5 welcome">Selamat Datang, {{$mhs_id->nama }}!</h1>
            </div>
        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom text-center pb-4">
                    @if (Auth::user()->foto)
                    <img src="{{ $user->foto }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @else
                    <img src="{{ asset('sitak/assets/images/profile.jpg') }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @endif
                    <div class="d-flex justify-content-center">
                        <div class="badge badge-gradient-primary  card-hover">{{$mhs_id->nama}}</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi Pendadaran Anda</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> <b>IP Terakhir </b> </td>
                                <td> <b>:</b> </td>
                                <td> 3,93 </td>
                            </tr>
                            <tr>
                                <td> <b>IPK </b> </td>
                                <td> <b>:</b></td>
                                <td> 3,84 </td>
                            </tr>
                            <tr>
                                <td> <b>Total SKS</b> </td>
                                <td> <b>:</b> </td>
                                <td> 138 </td>
                            </tr>
                            <tr>
                                <td> <b>Tanggal Pendadaran</b> </td>
                                <td> <b>:</b> </td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->tanggal }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Waktu Pelaksanaan</b></td>
                                <td> <b>:</b></td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->jamMulai }} s/d {{ $pendadaran->jamSelesai }} WIB </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 1</b> </td>
                                <td> <b>:</b> </td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->penguji1->nama }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 2</b> </td>
                                <td> <b>:</b> </td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->penguji2->nama }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 3</b> </td>
                                <td> <b>:</b></td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->penguji3->nama }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Dosen Penguji 4</b> </td>
                                <td> <b>:</b></td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @elseif($pendadaran->statuspendadaran_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($pendadaran->statuspendadaran_id >=5)
                                    <td> {{ $pendadaran->penguji4->nama }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Status Pelaksanaan</b> </td>
                                <td> <b>:</b> </td>
                                @if ($pendadaran == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Pendadaran</span>
                                </td>
                                @else
                                <td>
                                    <span class="badge badge-primary badge-pill">
                                        {{ $pendadaran->StatusPendadaran->status }}
                                    </span>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Tahapan Pendadaran</h4>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column todo-list todo-list-custom">
                        @foreach ($statusPendadaran as $value)
                        <li>
                            <div class="form-check">
                                @if($pendadaran == null)
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> {{ $value->status }} <i class="input-helper"></i></label>
                                @else
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" value="{{ $value->id }} " {{ $loop->iteration <= $pendadaran->statuspendadaran_id && $loop->iteration != 1 || $pendadaran->statuspendadaran_id == 1 && $loop->iteration == $pendadaran->statuspendadaran_id ? 'checked' : '' }}> {{ $value->status }} <i class="input-helper"></i></label>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
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
                            @if($pendadaran == null)
                            <tr>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum mengajukan Pendadaran</div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    @if($pendadaran->statuspendadaran_id >=5)
                                    @if (File::exists(public_path('storage/assets/file/Berita Acara Pendadaran/' . $pendadaran->beritaacara . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $pendadaran->beritaacara) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $pendadaran->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('beritaacarapendadaran.download', $pendadaran->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    Berita Acara Pendadaran
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

    <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-primary card-img-holder text-white  card-hover">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3">Persyaratan Mengajukan Pendadaran
                </h4>
                <ul>
                    <li>Mengambil Mata Kuliah Pendadaran</li>
                    <li>Telah menyelesaikan Tugas Akhir</li>
                    <li>Lulus Ujian UEPT (Nilai Minimal 400 dan masih berlaku < 2 tahun) </li>
                    <li>Sudah lulus semua mata kuliah tanpa nilai <span class="badge badge-danger badge-pill">E</span></li>
                    <li>Nilai tugas akhir sudah di upload di sistem SIA Unsoed</li>
                    <li>Lembar Validasi Nilai Transkip Akademik dengan ketua program studi.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('mahasiswa.TA.layouts.main')
@section('icon', 'home')
@section('title', 'Beranda')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left img-start img-hover" src="{{ asset('sitak/assets/images/hello.svg') }}" style="width: 250px">
                <h1 class="card-title text-white text-center mt-5 welcome">Selamat Datang, {{$mhs_id->nama }}!</h1>
            </div>
        </div>
    </div>

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom text-center pb-4">
                    @if (Auth::user()->foto)
                    <img src="{{ $mhs_id->foto }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @else
                    <img src="{{ asset('sitak/assets/images/profile.jpg') }}" alt="{{$mhs_id->nama}}" class="img-lg rounded-circle mb-3">
                    @endif
                    <div class="d-flex justify-content-center ">
                        <div class="badge badge-gradient-primary card-hover">{{$mhs_id->nama}}</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi TA Anda</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> <b> IPK</b></td>
                                <td> <b>:</b> </td>
                                @if ($mhs_id->ipk == Null)
                                <td><div class="badge badge-danger ">Belum Mengajukan Data IPK</div></td>
                                @else
                                <td>{{ $mhs_id->ipk }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Total SKS </b> </td>
                                <td> <b>:</b> </td>
                                @if ($mhs_id->sks == Null)
                                <td><div class="badge badge-danger ">Belum Mengajukan Data SKS</div></td>
                                @else
                                <td>{{ $mhs_id->sks }}</td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Judul Penelitian</b> </td>
                                <td> <b>:</b> </td>
                                <td style="text-overflow: ellipsis;">
                                    @if ($TA == null)
                                    <span class="badge badge-danger">Belum mengajukan Tugas Akhir</span>
                                    @else
                                    {{ $TA->judulTA }}
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Lokasi Penelitian</b> </td>
                                <td> <b>:</b> </td>
                                @if ($TA == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Tugas Akhir</span>
                                </td>
                                @else
                                <td>
                                    @if($TA->instansi == null)
                                    <div class="text-danger">tidak ada lokasi penelitian</div>
                                    @else
                                    {{ $TA->instansi }}
                                    @endif
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Status Pelaksanaan</b> </td>
                                <td> <b>:</b> </td>
                                @if ($TA == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Tugas Akhir</span>
                                </td>
                                @else
                                <td>
                                    <span class="badge badge-primary badge-pill">
                                        {{ $TA->status->ket }}
                                    </span>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b> SPK Disahkan</b> </td>
                                <td> <b>:</b> </td>
                                @if ($spk == null)
                                <td>
                                    <span class="badge badge-danger">SPK Tugas Akhir Belum Terbit</span>
                                </td>
                                @else
                                <td> {{ $sah }} </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>SPK Berakhir</b> </td>
                                <td> <b>:</b> </td>
                                <td> {{$expired}} </td>
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
                <h4 class="card-title mb-3">Tahapan TA</h4>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column todo-list todo-list-custom">
                        @foreach ($status as $value)
                        <li>
                            <div class="form-check">
                                @if($TA == null)
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> {{ $value->ket }} <i class="input-helper"></i></label>
                                @else
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" value="{{ $value->id }} " {{ $loop->iteration <= $TA->status_id && $loop->iteration != 1 || $TA->status_id == 1 && $loop->iteration == $TA->status_id ? 'checked' : '' }}> {{ $value->ket }} <i class="input-helper"></i></label>
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
                            @if($TA == null)
                            <tr>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum mengajukan Tugas Akhir</div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    @if($TA->status_id >=5 && $spk)
                                    @if (File::exists(public_path('storage/assets/file/SPK TA/' . $spk->fileSPK . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('download.spk', $spk->fileSPK) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('download.spk', $spk->fileSPK) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $spk->fileSPK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    SPK Tugas Akhir
                                    <div class="badge badge-danger badge-pill float-right">Belum Terbit</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if($TA->status_id >=7 && $semprop)
                                    @if (File::exists(public_path('storage/assets/file/Berita Acara Semprop TA/' . $semprop->beritaacara . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('download.semprop', $semprop->beritaacara) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semprop->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('download.semprop', $semprop->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semprop->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    Berita Acara Seminar Proposal
                                    <div class="badge badge-danger badge-pill float-right">Belum Terbit</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @if($TA->status_id >=9 && $semhas)
                                    @if (File::exists(public_path('storage/assets/file/Berita Acara Semhas TA/' . $semhas->beritaacara . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('download.semhas', $semhas->beritaacara) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semhas->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('download.semhas', $semhas->beritaacara) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $semhas->beritaacara }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    Berita Acara Seminar Hasil
                                    <div class="badge badge-danger badge-pill float-right">Belum Terbit</div>
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
                {{-- <img src="{{ asset('sitak/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image"> --}}
                <h4 class="font-weight-normal mb-3">Persyaratan Mengajukan Tugas Akhir
                </h4>
                <ul>
                    <li>sedang mengambil mata kuliah TA</li>
                    <li>telah menyelesaikan matakuliah sekurang-sekurangnya 120 SKS dengan IPK
                        serendah-rendahnya 2,0</li>
                    <li>telah menyelesaikan sekurang-kurangnya 1 (satu) mata kuliah pilihan sesuai
                        dengan bidang keahlian topik TA</li>
                    <li>telah menyelesaikan Kerja Praktik</li>
                    <li>praproposal yang telah disetujui 1 (satu) calon pembimbing</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

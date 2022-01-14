@extends('mahasiswa.yudisium.layouts.main')
@section('content')
@section('icon', 'home')
@section('title', 'Beranda Mahasiswa')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card  bg-gradient-primary">
            <div class="card-body">
                <img class="float-left img-hover" src="{{ asset('sitak/assets/images/party.svg') }}" alt="" style="width: 150px">
                <h1 class="card-title text-white text-center mt-5 welcome">Selamat Datang, {{$mhs_id->nama}}!</h1>
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
                        <div class="badge badge-gradient-primary  card-hover">{{$mhs_id->nama}}</div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Deskripsi Yudisium Anda</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td> <b>IPK </b> </td>
                                <td> <b>:</b> </td>
                                @if($yudisium != null)
                                <td> {{ $yudisium->mahasiswa->ipk }} </td>
                                @else
                                <td>
                                    <span class="badge badge-danger">Data IPK Belum Terbit</span>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Total SKS </b> </td>
                                <td> <b>:</b> </td>
                                @if($yudisium != null)
                                <td> {{ $yudisium->mahasiswa->sks }} </td>
                                @else
                                <td>
                                    <span class="badge badge-danger">Data SKS Belum Terbit</span>
                                </td>
                                @endif
                            </tr>
                            <tr>
                                <td> <b>Tanggal Yudisium</b> </td>
                                <td> <b>:</b></td>
                                @if ($yudisium == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Yudisium</span>
                                </td>
                                @elseif($yudisium->status_id <5) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($yudisium->status_id >=5)
                                    <td> {{ $yudisium->periodeYudisium->tanggal }} </td>
                                    @endif
                            </tr>
                            <tr>
                                <td> <b>Waktu</b> </td>
                                <td> <b>:</b></td>
                                @if ($yudisium == null)
                                <td>
                                    <span class="badge badge-danger">Belum mengajukan Yudisium</span>
                                </td>
                                @elseif($yudisium->status_id <6) <td>
                                    <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                    </td>
                                    @elseif($yudisium->status_id >=7)
                                    <td> {{ $yudisium->periodeYudisium->waktu }} </td>
                                    @endif
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
                <h4 class="card-title mb-3">Tahapan Yudisium</h4>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column todo-list todo-list-custom">
                        @foreach ($statusYudisium as $value)
                        <li>
                            <div class="form-check">
                                @if($yudisium == null)
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> {{ $value->status }} <i class="input-helper"></i></label>
                                @else
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" value="{{ $value->id }} " {{ $loop->iteration <= $yudisium->status_id && $loop->iteration != 1 || $yudisium->status_id == 1 && $loop->iteration == $yudisium->statusyudisium_id ? 'checked' : '' }}> {{ $value->status }} <i class="input-helper"></i></label>
                                @endif
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
            {{-- <div class="card-body">
                <h4 class="card-title mb-5">Status Pelaksanaan Studi Akhir</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Nama </th>
                                <th> Status Tugas Akhir </th>
                                <th> Status Pendadaran </th>
                                <th> Status Yudisium </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Qotrunnada Oktiriani </td>
                                <td>
                                    <div class="badge badge-success badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-success badge-pill">Selesai</div>
                                </td>
                                <td>
                                    <div class="badge badge-primary badge-pill">Disetujui</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <div class="card-body">
                <h4 class="card-title mb-3">File Unduhan</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <tbody>
                            @if($yudisium == null)
                            <tr>
                                <td>
                                    <div class="badge badge-danger badge-pill">Belum mengajukan Yudisium</div>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>
                                    @if($yudisium->status_id >= 4)
                                    @if (File::exists(public_path('storage/assets/file/sk/' . $yudisium->periodeYudisium->fileSK . '')))
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.sk', $yudisium->periodeYudisium->fileSK) }}" method="post" target="blank">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $yudisium->periodeYudisium->fileSK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="btn-group">
                                        <form action="{{ route('yudisium.sk', $yudisium->periodeYudisium->fileSK) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-gradient-primary btn-sm download">{{ $value->periodeYudisium->fileSK }} <i class="mdi mdi-download"></i></a></button>
                                        </form>
                                    </div>
                                    @endif
                                    @else
                                    Surat Kelulusan
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
                <h4 class="font-weight-normal mb-3">Persyaratan Mengajukan Yudisium
                </h4>
                <ul>
                    <li>Menyerahkan Surat Perintah Kerja(SPK) Tugas Akhir</li>
                    <li>Berkas Penilaian Komprehensif (Pendadaran) disiapkan Bapendik</li>
                    <li>Distribusi Jilid Laporan Tugas Akhir ke: PII Fakultas Teknik, Pembimbing 1 dan 2 menggunakan FORM Distribusi</li>
                    <li>Bukti Jilid Laporan Tugas akhir ke Perpustakaan UNSOED</li>
                    <li>Surat Cuti Akademik (apabila pernah cuti dan <b>Wajib di lampirkan</b>) </li>
                    <li>Foto Copy Ijazah SMA/SMK (<b>Wajib di lampirkan</b>)</li>
                    <li>Mengisi Surat Keterangan Pendamping Ijazah pada SIA, di cetak serta lampirkan foto copy sertifikat</li>
                    <li>Biodata mahasiswa adalah biodata a pada saat mendaftar wisuda setelah yudisium Fakultas</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

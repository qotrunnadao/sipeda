<!doctype html>
<html lang="en">

<head>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
        }

        .container {
            width: 100%;
            padding-right: 20px;
            padding-left: 20px;
        }

        p {
            line-height: 1.5;
            font-size: 12px;
        }

        td {
            line-height: 1.5;
            font-size: 12px;
        }

        li {
            line-height: 1.5;
            font-size: 12px;
        }

        .ml-5 {
            margin-left: 30px !important;
        }

        .mt-5 {
            margin-top: 30px !important;
        }

        .mt-4 {
            margin-top: 20px !important;
        }

        .mt-3 {
            margin-top: 18px !important;
        }

        .mt-2 {
            margin-top: 0.5rem !important;
        }

        .mt-1 {

            margin-top: 0.25rem !important;
        }

        .mr-2 {
            margin-right: 9px !important;
        }

        .mr-4 {
            margin-right: 20px !important;
        }

        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -20px;
            margin-left: -20px;
        }

        .col,
        .col-md-1,
        .col-md-10 {
            position: relative;
            width: 100%;
            padding-right: 20px;
            padding-left: 20px;
        }

        .page-break {
            page-break-after: always;
        }

        .col {
            padding-right: 0;
            padding-left: 0;
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }

        .col-md-1 {
            flex: 0 0 8.33333%;
            max-width: 8.33333%;
        }

        .col-md-10 {
            flex: 0 0 83.33333%;
            max-width: 83.33333%;
        }

        .col-md-8 {
            flex: 0 0 66.66667%;
            max-width: 66.66667%;
        }

        .col-md-4 {
            flex: 0 0 33.33333%;
            max-width: 33.33333%;
        }

        .float-left {
            float: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .ttd {
            display: flex;
            flex: 100%;
            float: right;
            /* position: absolute; */
            /* justify-content: flex-end;
            display: flex; */
        }

        .table {
            border-collapse: collapse;
            /* margin-bottom: 1rem; */
            color: #212529;
            line-height: 1.5;
            width: 100%;
        }

        .table th,
        .table td {
            /* padding: 0.9375rem; */
            vertical-align: center;
            border-top: 1px solid #212529;
            line-height: 1.5;
        }

        .table thead th {
            vertical-align: center;
            border-bottom: 2px solid #212529;
        }

        .table tbody+tbody {
            border-top: 2px solid #212529;
        }

        .table-bordered {
            border: 1px solid #212529;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #212529;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
            align-content: center;
        }

        .baris {
            height: 650px;
        }
    </style>
    <title>Berkas Semhas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">

        <div class="mt-3">
            <table>
                <tbody>
                    <tr>
                        <td> Nomor </td>
                        <td>:</td>
                        <td> <b>{{ $ta_id->no_surat }}</b> </td>
                    </tr>
                    <tr>
                        <td> Lampiran </td>
                        <td>:</td>
                        <td> 9 (dua) Lembar </td>
                    </tr>
                    <tr>
                        <td> Perihal </td>
                        <td>:</td>
                        <td> Undangan Seminar Proposal Tugas Akhir </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Yth. Bapak/Ibu</p>
            <ol>
                @if ($ta_id->ta->Dosen1 == null)
                <td> {{$ta_id->ta->namaDosen}} (Dosen Pembimbing 1) </td>
                @else
                <li>{{ $ta_id->ta->Dosen1->nama }} (Dosen Pembimbing 1)</li>
                @endif
                @if ($ta_id->ta->Dosen2 == null)
                <td> {{$ta_id->ta->namaDosen}} (Dosen Pembimbing 2) </td>
                @else
                <li>{{ $ta_id->ta->Dosen2->nama }} (Dosen Pembimbing 2)</li>
                @endif
                @if($ta_id->ta->mahasiswa->jurusan_id == 3 || $ta_id->ta->mahasiswa->jurusan_id == 5)
                @if ($ta_id->penguji1 == null)
                <td> </td>
                @else
                <li>{{ $ta_id->penguji1->nama }} (Dosen Penguji 1)</li>
                @endif
                @if ($ta_id->penguji2 == null)
                <td> </td>
                @else
                <li>{{ $ta_id->penguji2->nama }} (Dosen Penguji 2)</li>
                @endif
                @if ($ta_id->penguji3 == null)
                <td> </td>
                @else
                <li>{{ $ta_id->penguji3->nama }} (Dosen Penguji 3)</li>
                @endif
                @endif
                <li>Semua mahasiswa di tempat</li>
            </ol>
        </div>

        <div class="mt-3">
            <p>Berdasarkan usulan dari mahasiswa berikut :</p>
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> <b> {{ $ta_id->ta->mahasiswa->nama }}</b> </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Judul TA </td>
                        <td>:</td>
                        <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>akan melakukan seminar proposal tugas akhir pada :</p>
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Demikian surat undangan seminar proposal tugas akhir , terimakasih atas perhatiannya.</p>
        </div>

        <div class="mr-4 mt-5 ttd">
            <table>
                <tbody>
                    <tr>
                        <td>Purbalingga, {{ $spk }}</td>
                    </tr>
                    <tr>
                        <td>Ketua Jurusan {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }}</td>
                    </tr>
                    <tr>
                        <td height="70px"></td>
                    </tr>
                    <tr>
                        <td class="text-center"><b><u>{{ $dosen->nama }}</u></b></td>
                    </tr>
                    <tr>
                        <td class="text-center">NIP. {{ $dosen->nip }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, mahasiswa]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN DAFTAR HADIR SEMINAR PROPOSAL TUGAS AKHIR</b><br>
            Tentang
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama :</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                    <tr>
                        <td> Jumlah Peserta </td>
                        <td>:</td>
                        <td> ..................... (*) </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="mt-3">
            <p>Dengan rincian peserta sebagai berikut :</p>
            <div>
                <table class="table table-bordered" style="width: 100%;">
                    <thead class="text-center">
                        <tr style="border-width:medium;">
                            <th width="10%">No</th>
                            <th width="20%">NIM</th>
                            <th width="50%">Nama</th>
                            <th width="20%">Tanda tangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php ($no=1)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <p>Ditetapkan di Purbalingga,</p>
        </div>

        <div class="mt-3">
            <table class="table table-bordered" style="width: 100%;">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="25%">Keterangan</th>
                        <th width="25%">Keterangan</th>
                        <th width="30%">Nama Pembimbing dan Penelaah</th>
                        <th width="10%">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php ($no=1)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Pembimbing I</td>
                        <td>Ketua</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Pembimbing II</td>
                        <td>Anggota</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Pembimbing III</td>
                        <td>Anggota</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Penelaah I</td>
                        <td>Anggota</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Penelaah II</td>
                        <td>Anggota</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Penelaah III</td>
                        <td>Anggota</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Catatan : seminar Proposal TA dianggap sah jika peserta/mahasiswa yang hadir minimal 10 orang.</p>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>

    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN BERITA ACARA SEMINAR PROPOSAL TUGAS AKHIR</b>
        </p>
        <p class="text-center mt-4">JUDUL PROPOSAL TUGAS AKHIR <br>
            Tentang
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                    <tr>
                        <td> Jumlah Peserta </td>
                        <td>:</td>
                        <td> ..................... (*) </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Hal yang harus diperhatikan dalam perbaikan proposal : (**)</p>
            <p>...........................................................................................................................................................................................................</p>
            <p>...........................................................................................................................................................................................................</p>
            <p>...........................................................................................................................................................................................................</p>
        </div>

        <div>
            <p>Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table class="table table-bordered" style="width: 100%;">
                <tbody class="text-center">
                    <tr>
                        <td style="width: 30%">Pembimbing I <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Pembimbing II <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Pembimbing III <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Penelaah I <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Penelaah II <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Penelaah III <br>
                            NIP.</td>
                        <td style="width: 40%%"></td>
                        <td style="width: 10%">ttd:</td>
                        <td style="width: 20%"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>(*) diisi oleh dosen pembimbing</p>
            <p>(**) Jika diperlukan, dapat diberi tambahan halaman.</p>
        </div>

    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Pembimbing 1</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        @if ($ta_id->ta->Dosen1 == null)
                        <td width=50%> {{ $ta_id->ta->namaDosen }} <br>
                            NIP. {{ $ta_id->ta->nip }} </td>
                        <td> ttd : .................</td>
                        @else
                        <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Pembimbing II</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing II </td>
                        <td>:</td>
                        @if ($ta_id->ta->Dosen2 == null)
                        <td width=50%> {{ $ta_id->ta->namaDosen }} <br>
                            NIP. {{ $ta_id->ta->nip }} </td>
                        <td> ttd : .................</td>
                        @else
                        <td width=50%> {{ $ta_id->ta->Dosen2->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Pembimbing III</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing III </td>
                        <td>:</td>
                        @if ($ta_id->ta->Dosen3 == null)
                        <td width=50%> {{ $ta_id->ta->namaDosen }} <br>
                            NIP. {{ $ta_id->ta->nip }} </td>
                        <td> ttd : .................</td>
                        @else
                        <td width=50%> {{ $ta_id->ta->Dosen3->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen3->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Penelaah I</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Penelaah I </td>
                        <td>:</td>
                        @if ($ta_id->penguji1 == null)
                        <td> </td>
                        @else
                        <td width="30%"> Penelaah I</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji1->nama }} <br>
                            NIP. {{ $ta_id->penguji1->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Penelaah II</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Penelaah II </td>
                        <td>:</td>
                        @if ($ta_id->penguji2 == null)
                        <td> </td>
                        @else
                        <td width="30%"> Penelaah II</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji2->nama }} <br>
                            NIP. {{ $ta_id->penguji2->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="40%">Nilai Penelaah III</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Tata bahasa penulisan proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kecocokan tujuan dengan metode penelitian (40-100)</td>
                        <td></td>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Materi Proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan terhadap metode dan tinjauan pustaka tugas akhir (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Diskusi (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kelayakan topik proposal (40-100)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Seminar proposal dinyatakan lulus jika nilai rata - ratanya minimal 60.<br>
                Ditetapkan di Purbalingga,</p>
        </div>

        <div>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Penelaah III </td>
                        <td>:</td>
                        @if ($ta_id->penguji3 == null)
                        <td> </td>
                        @else
                        <td width="30%"> Penelaah III</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji3->nama }} <br>
                            NIP. {{ $ta_id->penguji3->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 float-left">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="110" width="110">
            </div>
            <div class="col-md-10 float-right mr-5 ml-5">
                <p class="text-center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR PROPOSAL TUGAS AKHIR PRODI TEKNIK GEOLOGI</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $ta_id->ta->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $ta_id->ta->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} - {{ $jamSelesai }} </td>
                    </tr>
                    <tr>
                        <td> Ruang </td>
                        <td>:</td>
                        <td> di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="50%">Komponen Penilaian</th>
                        <th width="20%">Nilai Pembimbing I</th>
                        <th width="20%">Nilai Pembimbing II</th>
                        <th width="20%">Nilai Pembimbing III</th>
                        <th width="20%">Nilai Penelaah I</th>
                        <th width="20%">Nilai Penelaah II</th>
                        <th width="20%">Nilai Penelaah III</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>TOTAL NILAI</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td width=30%><b>A = Nilai >= 80.00</b> </td>
                        <td width=30%> <b>BC = Nilai 65.00 - 69.99</b></td>
                        <td width=30%><b>D = Nilai 46.00 - 55.99</b></td>
                    </tr>
                    <tr>
                        <td width=40%><b>AB = Nilai 75.00 - 79.99</b></td>
                        <td width=40%><b>C = Nilai 60.00 - 64.99</b></td>
                        <td width=40%><b>E = Nilai < 46.00</b>
                        </td>
                    </tr>
                    <tr>
                        <td width=30%><b>B = Nilai 70.00 - 74.99</b></td>
                        <td width=30%><b>CD = Nilai 56.00 - 59.99</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table>
                <tbody>
                    <tr>
                        <td><b>NILAI AKHIR</b></td>
                        <td>:</td>
                        <td>..............</td>
                    </tr>
                </tbody>
            </table>
            <p>(nilai akhir adalah jumlah nilai rata-rata semua pembimbing dan penelaah, dibagi jumlah pembimbing dan penelaah)</p>
            <table>
                <tbody>
                    <tr>
                        <td><b>HURUF MUTU</b></td>
                        <td>:</td>
                        <td>..............</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>
                Seminar Proposal TA dinyatakan lulus jika nilai akhirnya tidak kurang dari 60 <br>
                Beda Nilai (Deviasi Nilai) antar penguji tidak boleh lebih dari 10 poin
            </p>
            <p>Ditetapkan di Purbalingga, </p>
        </div>

        <div>
            <table class="table table-bordered" style="width: 100%">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        @if ($ta_id->ta->Dosen1 == null)
                        <td width=50%> {{ $ta_id->ta->namaDosen }} <br>
                            NIP. {{ $ta_id->ta->nip }} </td>
                        <td> ttd : .................</td>
                        @else
                        <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        @if ($ta_id->ta->Dosen2 == null)
                        <td width=50%> {{ $ta_id->ta->namaDosen }} <br>
                            NIP. {{ $ta_id->ta->nip }} </td>
                        <td> ttd : .................</td>
                        @else
                        <td width=50%> {{ $ta_id->ta->Dosen2->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                    <tr>
                        @if ($ta_id->penguji1 == null)
                        <td> </td>
                        @else
                        <td width="30%"> Penguji 1</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji1->nama }} <br>
                            NIP. {{ $ta_id->penguji1->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                    <tr>
                        @if ($ta_id->penguji2 == null)
                        <td> </td>
                        @else

                        <td width="30%"> Penguji 2</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji2->nama }} <br>
                            NIP. {{ $ta_id->penguji2->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                    <tr>
                        @if ($ta_id->penguji3 == null)
                        <td> </td>
                        @else
                        <td width="30%"> Penguji 3</td>
                        <td>:</td>
                        <td width=50%> {{ $ta_id->penguji3->nama }} <br>
                            NIP. {{ $ta_id->penguji3->nip }} </td>
                        <td> ttd : .................</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>
    </div>
</body>

</html>

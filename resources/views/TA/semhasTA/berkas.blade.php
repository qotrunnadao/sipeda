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
    <div class="container ml-5 mt-5 mr-2">
        <div class="row">
            {{-- <div class="col col-md-1 float-left ml-5">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
            </div> --}}
            {{-- <div class="col col-md-10 float-left"> --}}
                <div class="col">
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
                            <td> 2 (dua) Lembar </td>
                        </tr>
                        <tr>
                            <td> Perihal </td>
                            <td>:</td>
                            <td> Undangan Seminar Hasil TA </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <p>Yth. Bapak/Ibu</p>
                <ol>
                    <li>{{ $ta_id->ta->Dosen1->nama }} (Dosen Pembimbing 1)</li>
                    <li>{{ $ta_id->ta->Dosen2->nama }} (Dosen Pembimbing 2)</li>
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
                <p>akan melakukan seminar hasil tugas akhir pada :</p>
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
                <p>Demikian surat undangan seminar hasil tugas akhir , terimakasih atas perhatiannya.</p>
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

            {{-- <div class="mt-3">
                <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
            </div> --}}
        </div>

        <div class="page-break"></div>

        <div class="container ml-5 mr-2">
            <div class="row g-0">
                {{-- <div class="col col-md-1 float-left ml-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
                </div> --}}
                <div class="col">
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


            <p class="text-center mt-4"><b>LAMPIRAN BERITA ACARA SEMINAR HASIL TUGAS AKHIR</b>
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
                            <td> Judul Tugas Akhir </td>
                            <td>:</td>
                            <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
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
                <p>Hal yang harus diperhatikan dalam perbaikan tugas akhir : (**)</p>
                <p>...........................................................................................................................................................................................................</p>
                <p>...........................................................................................................................................................................................................</p>
                <p>...........................................................................................................................................................................................................</p>
            </div>

            <div>
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
           </div>

            <div class="mt-3">
                <table class="ml-3" style="width: 100%">
                    <tbody>
                        <tr>
                            <td width="30%"> Pembimbing 1 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                        <tr>
                            <td width=30%> Pembimbing 2 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen2->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <p><i>(*) diisi oleh dosen pembimbing</i></p>
                <p><i>(**) jika diperlukan dapat diberi halaman tambahan</i></p>
            </div>

            <div class="mt-5">
                <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
            </div>

        </div>

        <div class="page-break"></div>

        <div class="container ml-5 mr-2">
            <div class="row">
                {{-- <div class="col col-md-1 float-left ml-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
                </div> --}}
                <div class="col">
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


            <p class="text-center mt-4"><b>LAMPIRAN DAFTAR HADIR SEMINAR HASIL TUGAS AKHIR</b>
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
                            <td> Judul Tugas Akhir </td>
                            <td>:</td>
                            <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
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
                <p>Dengan perincian peserta sebagai berikut</p>
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

            <div>
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
           </div>

            <div>
                <table style="width:100%">
                    <tbody>
                        <tr>
                            <td width="30%"> Pembimbing 1 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                        <tr>
                            <td width=30%> Pembimbing 2 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen2->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <p>Catatan : seminar TA dianggap sah jika peserta/mahasiswa yang hadir minimal 10 orang.</p>
            </div>

            <div>
                <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
            </div>

        </div>

        <div class="page-break"></div>

        <div class="container ml-5 mr-2">
            <div class="row">
                {{-- <div class="col col-md-1 float-left ml-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
                </div> --}}
                <div class="col">
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


            <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR HASIL TUGAS AKIR</b>
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
                            <td> Judul Tugas Akhir </td>
                            <td>:</td>
                            <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
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
                <p>Dengan perincian nilai sebagai berikut</p>
                <table class="table table-bordered" style="width:100%">
                    <thead class="text-center">
                        <tr style="border-width:medium;">
                            <th width="10%">No</th>
                            <th width="50%">Komponen Penilaian</th>
                            <th width="20%">Nilai Pembimbing 1</th>
                            <th width="20%">Nilai Pembimbing 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($no=1)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Sistematika penulisan laporan (0-100)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Tata bahasa penulisan laporan (0-100)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Sistematika penjelasan materi seminar (0-100)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Kecocokan isi laporan dengan materi seminar (0-100)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Materi Tugas Akhir (0-100)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Penguasaan terhadat permasalahan tugas akhir</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Diskusi</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><b>TOTAL NILAI (rata-rata)</b> </td>
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
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
            </div>

            <div>
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td width="30%"> Pembimbing 1 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                        <tr>
                            <td width=30%> Pembimbing 2 </td>
                            <td>:</td>
                            <td width="50%"> {{ $ta_id->ta->Dosen2->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="container ml-5 mr-2">
            <div class="row">
                {{-- <div class="col col-md-1 float-left ml-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
                </div> --}}
                <div class="col">
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


            <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN UJIAN TUGAS AKHIR</b>
            </p>

            <div class="mt-3">
                <p>Telah melakukan ujian tugas akhir atas nama mahasiswa sebagai berikut,</p>
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
                            <td> Judul Tugas Akhir </td>
                            <td>:</td>
                            <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
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
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <p>Dengan perincian nilai sebagai berikut</p>
                <table class="table table-bordered" style="width: 100%">
                    <thead class="text-center">
                        <tr style="border-width:medium;">
                            <th width="10%">No</th>
                            <th width="40%">Komponen Penilaian</th>
                            <th width="20%">Nilai Pembimbing 1</th>
                            <th width="20%">Nilai Pembimbing 2</th>
                            <th width=10%>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($no=1)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Penguasaan materi (cara dan sistematika penyampaian makalah, jawaban pertanyaan)</td>
                            <td></td>
                            <td></td>
                            <td>70%</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Cara menjawab pertanyaan dari penguji</td>
                            <td></td>
                            <td></td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center"><b>TOTAL NILAI (rata - rata)</b></td>
                            <td colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
            </div>

            <div>
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td width="30%"> Pembimbing 1 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                        <tr>
                            <td width=30%> Pembimbing 2 </td>
                            <td>:</td>
                            <td width="50%"> {{ $ta_id->ta->Dosen2->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="container ml-5 mr-2">
            <div class="row">
                {{-- <div class="col col-md-1 float-left ml-5">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Logo-unsoed-2017-bw.png/747px-Logo-unsoed-2017-bw.png" height="130" width="130">
                </div> --}}
                <div class="col">
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


            <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN TUGAS AKHIR</b>
            </p>

            <div class="mt-3">
                <p>Telah melakukan seminar dan ujian tugas akhir atas nama mahasiswa sebagai berikut,</p>
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
                            <td> Judul Tugas Akhir </td>
                            <td>:</td>
                            <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
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
                <p>Dengan perincian nilai sebagai berikut</p>
                <table class="table table-bordered" style="width: 100%">
                    <thead class="text-center">
                        <tr style="border-width:medium;">
                            <th width="10%">No</th>
                            <th width="50%">Komponen Penilaian</th>
                            <th width="10%">NILAI</th>
                            <th width="10%">BOBOT</th>
                            <th width="20%">Nilai x Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($no=1)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Seminar Tugas Akhir</td>
                            <td></td>
                            <td>60%</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>Ujian Tugas Akhir</td>
                            <td></td>
                            <td>40%</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center"> <b>TOTAL NILAI</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center"> <b>HURUF MUTU</b></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <p>Keterangan</p>
                <table style="width:100%;">
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
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
           </div>

            <div>
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td width="30%"> Pembimbing 1 </td>
                            <td>:</td>
                            <td width=50%> {{ $ta_id->ta->Dosen1->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen1->nip }} </td>
                            <td> ttd : .................</td>
                        </tr>
                        <tr>
                            <td width=30%> Pembimbing 2 </td>
                            <td>:</td>
                            <td width="50%"> {{ $ta_id->ta->Dosen2->nama }} <br>
                                NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                            <td> ttd : .................</td>
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

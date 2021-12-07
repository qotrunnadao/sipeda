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
</head>

<body>
    <div class="container ml-5 mt-5 mr-2">
        <div class="row">
            <div class="col col-md-1 float-left ml-5">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="130" width="130">
            </div>
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
                        <td> Undangan Seminar Proposal TA </td>
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
                        <td> Judul Proposal TA </td>
                        <td>:</td>
                        <td style="text-transform: capitalize; border: 1px solid;"> {{ $ta_id->ta->judulTA }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
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

        <div>
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

        {{-- <div class="mt-5">
            <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
        </div> --}}

    </div>

    <div class="page-break"></div>
    <div class="container ml-5 mr-2">
        <div class="row">
            <div class="col col-md-1 float-left ml-5">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="130" width="130">
            </div>
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


        <p class="text-center mt-4"><b>LAMPIRAN BERITA ACARA SEMINAR PROPOSAL TUGAS AKHIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar proposal tugas akhir atas nama :</p>
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
            <p>Berdasarkan pelaksanaan seminar proposal tugas akhir, ditetapkan bahwa mahasiswa tersebut diatas dinyatakan : (**)</p>
            <ol>
                <li>Lulus</li>
                <li>Lulus dengan revisi</li>
                <li>Tidak lulus</li>
            </ol>
        </div>

        <div>
            <p>Telah ditetapkan di Purbalingga pada {{ $spk }} pada jam {{ $jamMulai }} s/d {{ $jamSelesai }} di ruang {{ $ta_id->ruang->namaRuang }} Fakultas Teknik Purbalingga.</p>
        </div>

        <div>
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
                        <td width="50%"> {{ $ta_id->ta->Dosen2->nama }} <br>
                            NIP. {{ $ta_id->ta->Dosen2->nip }} </td>
                        <td> ttd : .................</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
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
            <div class="col col-md-1 float-left ml-5">
                <img src="{{ public_path('unsoed_b&w.jpg') }}" height="130" width="130">
            </div>
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


        <p class="text-center mt-4"><b>LAMPIRAN DAFTAR HADIR SEMINAR PROPOSAL TUGAS AKHIR</b>
        </p>

        <div>
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
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
            <table class="table table-bordered" style="width: 100%">
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

        <div>
            <p>Catatan : seminar proposal TA dianggap sah jika peserta/mahasiswa yang hadir minimal 10 orang.</p>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
        </div>

    </div>
</body>

</html>

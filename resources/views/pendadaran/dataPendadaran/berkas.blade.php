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
                        <td> <b>{{ $pendadaran->no_surat }}</b> </td>
                    </tr>
                    <tr>
                        <td> Lampiran </td>
                        <td>:</td>
                        <td> 4 (Empat) Lembar </td>
                    </tr>
                    <tr>
                        <td> Perihal </td>
                        <td>:</td>
                        <td> Undangan Penguji Pendadaran </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="ml-5 mt-3">
            <p>Yth. Bapak/Ibu</p>
            <p>di tempat</p>
        </div>

        <div class="mt-3">
            <p>Berdasarkan pengajuan ujian pendadaran dari mahasiswa berikut :</p>
            <table class="ml-5" style="width: 100%">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> <b> {{ $pendadaran->mahasiswa->nama }}</b> </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $pendadaran->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $pendadaran->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>yang akan melakukan ujian pendadaran pada :</p>
            <table class="ml-5" style="width: 100%">
                <tbody>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} s/d {{ $jamSelesai }} WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $pendadaran->ruangpendadaran->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Demikian kesediaannya untuk menjadi penguji pendadaran mahasiswa tersebut , terimakasih atas perhatiannya.</p>
        </div>

        <div class="mr-4 mt-5 ttd">
            <table>
                <tbody>
                    <tr>
                        <td>Purbalingga, {{ $spk }}</td>
                    </tr>
                    <tr>
                        <td>Ketua Jurusan {{ $pendadaran->mahasiswa->Jurusan->namaJurusan }}</td>
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

        <div class="mt-5">
            <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
        </div>

    </div>

    <div class="page-break"></div>
    <div class="container ml-5 mr-2">
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


        <p class="text-center mt-4"><b>LAMPIRAN BERITA ACARA UJIAN KOMPREHENSIF</b>
        </p>

        <div class="mt-3">
            <p>Telah dilakukan ujian komprehensif atas nama :</p>
            <table class="ml-5" style="width: 100%">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $pendadaran->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $pendadaran->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $pendadaran->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} s/d {{ $jamSelesai }} WIB</td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $pendadaran->ruangpendadaran->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>dengan perincian para penguji sebagai berikut:</p>
        </div>

        <div>
            <p>Telah ditetapkan di Purbalingga pada hari {{ $hari }} di ruang {{ $pendadaran->ruangpendadaran->namaRuang }} Fakultas Teknik Universitas Jenderal Soedirman.</p>
        </div>

        <div class="mt-5">
            <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="container ml-5 mr-2">
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


        <p class="text-center mt-4"><b>LAMPIRAN DAFTAR HADIR SEMINAR PROPOSAL TUGAS AKHIR</b>
        </p>

        <div>
            <p>Telah melakukan seminar proposal tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table class="ml-5" style="width: 100%">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $pendadaran->mahasiswa->nama }} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{ $pendadaran->mahasiswa->nim }} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{ $pendadaran->mahasiswa->Jurusan->namaJurusan }} </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> {{ $hari }} </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> {{ $jamMulai }} s/d {{ $jamSelesai }} WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang {{ $pendadaran->ruangpendadaran->namaRuang }} Fakultas Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered ml-5" style="width: 100%">
                <thead class="text-center">
                    <tr style="border-width:medium;">
                        <th width="10%">No</th>
                        <th width="70%">Komponen Penilaian</th>
                        <th width="20%">NILAI</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($no=1)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Penguasaan materi dasar</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kemampuan rekayasa bidang keahlian (analisis, perancangan, penyelesaian masalah)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kemampuan berkomunikasi secara ilmiah</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>Kemampuan belajar mandiri untuk mengembangkan pengetahuan yang dimiliki</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"> <b>TOTAL NILAI</b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>Keterangan</p>
            <table class="ml-5" style="width:100%;">
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
            <p style="text-align: justify">Nilai diatas akan sah sebagai matakuliah Pendadaran jika yang bersangkutan telah dinyatakan lulus yang
                tercantum dalam Surat Kelulusan serta menyerahkan laporan Tugas Akhir yang telah dijilid dan disahkan.
                Telah ditetapkan di Purbalingga pada hari {{ $hari }} di ruang {{ $pendadaran->ruangpendadaran->namaRuang }} Fakultas Teknik Purbalingga.</p>

        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen penguji, bapendik, ketua komisi]</p>
        </div>

    </div>
</body>

</html>

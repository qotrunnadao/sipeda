<html>

<head>
    <title>Judul</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
        }

        .container {
            width: 100%;
            padding-right: 20px;
            padding-left: 20px;
            margin-right: auto;
            margin-left: auto;
        }

        .page-break {
            page-break-after: always;
        }

        p {
            line-height: 1.5;
            font-size: 18px;
        }

        td {
            line-height: 1.5;
            font-size: 18px;
        }

        li {
            line-height: 1.5;
            font-size: 18px;
        }

        .ml-5 {
            margin-left: 3rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mr-3 {
            margin-right: 0.5rem !important;
        }

        .mr-4 {
            margin-right: 1.5rem !important;
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

        .float-left {
            float: left !important;
        }

        .text-center {
            text-align: center !important;
        }



        .baris {
            height: 650px;
        }
    </style>
</head>

<body>
    <h1>Test123</h1>
    <div class="container ml-5 mt-5 mr-3">
        <div class="row">
            <div class="col col-md-1 float-left ml-5">
                <img src="/sitak/assets/images/unsoed_b&w.png" height="130" width="130">
            </div>
            <div class="col col-md-10 float-left">
                <p style="align:center;"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>SURAT PERINTAH KERJA TUGAS AKHIR <br>
                (SPK-TA) <br>
                Nomor: {{$taAll->no_surat}} </b>
        </p>

        <p>Berdasarkan hasil sidang Komisi Komisi Studi Akhir Fakultas Teknik Universitas Jenderal Soedirman, pada:
        </p>

        <div class="mt-3">
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Tanggal </td>
                        <td>:</td>
                        <td> {{ $today }} </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> Fakultas Teknik Purbalingga </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Tugas Akhir mahasiswa :</p>
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nim}} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{$taAll->mahasiswa->jurusan->namaJurusan}} </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td> {{$taAll->judulTA}} </td>
                    </tr>
                    <tr>
                        <td> Terhitung sejak </td>
                        <td>:</td>
                        <td>{{$today}} s.d {{ $tanggal }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>dengan pembimbing :</p>
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Dosen Pembimbing 1</td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nama}}</td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td>{{$taAll->Dosen1->nip}} </td>
                    </tr>
                </tbody>
            </table>
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Dosen Pembimbing 2</td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen2->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nip}} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Surat Perintah Kerja (SPK) Tugas Akhir ini diterbitkan untuk maksud dan fungsi sebagai:</p>
            <ol class="ml-5">
                <li>dasar mahasiswa melaksanakan tugas akhir</li>
                <li>penugasan untuk pembimbing,</li>
                <li>dasar penerbitan SK pembimbing Tugas Akhir.</li>
            </ol>
        </div>
        <div class="mr-4 mt-5" style="display: flex; justify-content: right;">
            <table>
                <tbody>
                    <tr>
                        <td>Purbalingga, {{ $today }}</td>
                    </tr>
                    <tr>
                        <td>Ketua Jurusan {{$taAll->mahasiswa->jurusan->namaJurusan}}</td>
                    </tr>
                    <tr>
                        <td height="100px"></td>
                    </tr>
                    <tr>
                        <td class="text-center"><b><u>{{$dosen->nama}}</u></b></td>
                    </tr>
                    <tr>
                        <td class="text-center">NIP. {{$dosen->nip}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <p>Disampaikan kepada :</p>
            <ol class="ml-5">
                <li>Dekan Fakultas Teknik</li>
                <li>Dosen Pembimbing</li>
                <li>Mahasiswa</li>
            </ol>
        </div>
    </div>
    <div class="page-break"></div>
    <div class="container ml-5 mr-2">
        <div class="row">
            <div class="col col-md-1 float-left ml-5">
                <img src="/sitak/assets/images/unsoed_b&w.png" height="130" width="130">
            </div>
            <div class="col col-md-10 float-left">
                <p align="center"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b><br> UNIVERSITAS JENDERAL SOEDIRMAN <br>
                    <b>FAKULTAS TEKNIK</b> <br>
                    Alamat : JI. Mayjend Sungkono km 5 Blater, Kalimanah, Purbalingga 53371 <br>
                    Telepon/Faks. : (0281)6596801 <br>
                    E-mail : ft@unsoed.ac.id Laman : ft.unsoed.ac.id
                </p>
            </div>
        </div>
        <hr color="#000000" style="margin-top: -10px">
        <hr color="#000000" style="height: 5px; margin-top: -10px;">


        <p class="text-center mt-4"><b>KARTU KENDALI <br>
                TUGAS AKHIR <br> </b>
        </p>

        <div class="mt-3">
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nim}} </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{$taAll->mahasiswa->jurusan->namaJurusan}} </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td> {{$taAll->judulTA}} </td>
                    </tr>
                    <tr>
                        <td> No SPK </td>
                        <td>:</td>
                        <td> {{$taAll->no_surat}} </td>
                    </tr>
                    <tr>
                        <td> Dimulai sejak </td>
                        <td>:</td>
                        <td> {{ $today }} s.d {{ $tanggal }} </td>
                    </tr>
                    <tr>
                        <td> Dosen Pembimbing 1</td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td>{{$taAll->Dosen1->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nip}} </td>
                    </tr>
                    <tr>
                        <td> Dosen Pembimbing 2</td>
                    </tr>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen2->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen2->nip}} </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="mt-3">
            <table class="table table-bordered" style="align:center; width:95%; border:1px; ">
                <thead>
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Tanggal dan Waktu
                            Bimbingan</th>
                        <th width="60%">Uraian</th>
                        <th>tanda
                            tangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center baris" table border="5">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            </table>
        </div>

        <div class="mt-5">
            <p>*) Kartu kendali dapat diperbanyak sendiri</p>
        </div>
    </div>

</body>

</html>

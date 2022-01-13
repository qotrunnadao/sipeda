<!doctype html>
<html lang="en">

<head>
    {{-- <title>Judul</title> --}}
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

        .mr-5 {
            margin-right: 100px !important;
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

        .col-md-2 {
            flex: 0 0 16.66667%;
            max-width: 16.66667%;
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
            margin-bottom: 1rem;
            color: #212529;
            line-height: 1;
        }

        .table th,
        .table td {
            padding: 0.9375rem;
            vertical-align: center;
            border-top: 1px solid #212529;
            line-height: 1;
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


        <p class="text-center mt-3"><b>SURAT PERINTAH KERJA TUGAS AKHIR <br>
                (SPK-TA) <br>
                Nomor: {{$taAll->no_surat}} </b>
        </p>

        <p>Berdasarkan hasil sidang Komisi Komisi Studi Akhir Fakultas Teknik Universitas Jenderal Soedirman, pada:
        </p>

        <div class="mt-2">
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

        <div>
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
                        <td style="text-transform: capitalize; border: 1px solid;"> {{$taAll->judulTA}}</td>
                    </tr>
                    <tr>
                        <td> Terhitung sejak </td>
                        <td>:</td>
                        <td>{{$today}} s.d {{ $tanggal }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <p>dengan pembimbing :</p>
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Dosen Pembimbing 1</td>
                    </tr>
                    @if ($taAll->Dosen1 == null)
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->namaDosen}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->nip}} </td>
                    </tr>
                    @else
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nip}} </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <table class="ml-5">
                <tbody>
                    <tr>
                        <td> Dosen Pembimbing 2</td>
                    </tr>
                    @if ($taAll->Dosen2 == null)
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->namaDosen}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->nip}} </td>
                    </tr>
                    @else
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
                    @endif
                </tbody>
            </table>
        </div>

        <div>
            <p>Surat Perintah Kerja (SPK) Tugas Akhir ini diterbitkan untuk maksud dan fungsi sebagai:</p>
            <ol class="ml-5">
                <li>dasar mahasiswa melaksanakan tugas akhir</li>
                <li>penugasan untuk pembimbing,</li>
                <li>dasar penerbitan SK pembimbing Tugas Akhir.</li>
            </ol>
        </div>
        <div class="mr-4 mt-5 ttd">
            <table>
                <tbody>
                    <tr>
                        <td>Purbalingga, {{ $today}}</td>
                    </tr>
                    <tr>
                        <td>Ketua Jurusan {{$taAll->mahasiswa->jurusan->namaJurusan}}</td>
                    </tr>
                    <tr>
                        <td height="60px"></td>
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
        <div class="mt-1">
            <p>Disampaikan kepada :</p>
            <ol class="ml-5">
                <li>Dekan Fakultas Teknik</li>
                <li>Dosen Pembimbing</li>
                <li>Mahasiswa</li>
            </ol>
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


        <p class="text-center mt-4"><b>KARTU KENDALI <br>
                TUGAS AKHIR <br> </b>
        </p>

        <div class="mt-3">
            <table>
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
                        <td style="text-transform: capitalize; border: 1px solid;"> {{$taAll->judulTA}} </td>
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
                    @if ($taAll->Dosen1 == null)
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->namaDosen}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->nip}} </td>
                    </tr>
                    @else
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nama}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->Dosen1->nip}} </td>
                    </tr>
                    @endif
                    <tr>
                        <td> Dosen Pembimbing 2</td>
                    </tr>
                    @if ($taAll->Dosen2 == null)
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td> {{$taAll->namaDosen}} </td>
                    </tr>
                    <tr>
                        <td> NIP </td>
                        <td>:</td>
                        <td> {{$taAll->nip}} </td>
                    </tr>
                    @else
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
                    @endif
                </tbody>
            </table>
        </div>


        <div class="mt-3">
            <table class="table table-bordered" style="align:center; width:100%;">
                <thead>
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Tanggal dan Waktu
                            Bimbingan</th>
                        <th width="60%">Uraian</th>
                        <th>Tanda
                            Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td style="height: 300px"></td>
                        <td style="height: 300px"></td>
                        <td style="height: 300px"></td>
                        <td style="height: 300px"></td>
                    </tr>
            </table>
        </div>
        <div class="mt-5">
            <p>*) Kartu kendali dapat diperbanyak sendiri</p>
        </div>
    </div>

</body>

</html>

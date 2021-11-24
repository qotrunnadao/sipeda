<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('sitak/assets/css/style.css') }}">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
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

        .baris {
            height: 650px;
        }
    </style>
    <title>SPK Tugas Akhir</title>
</head>

<body onload="window.print()">
    <div class="container ml-5 mt-5 mr-2">
        <div class="row g-0">
            <div class="col col-md-1 float-left ml-5">
                <img src="{{ asset('sitak/assets/images/unsoed_b&w.png') }}" height="130" width="130">
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
                        <td> {{ date('d F Y ') }} </td>
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
                        <td> 15 Februari 2021 s.d 15 Februari 2022 </td>
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
                        <td>{{$taAll->Dosen1->nohp}} </td>
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
                        <td> {{$taAll->Dosen1->nohp}} </td>
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
                        <td>Purbalingga, {{ date('d F Y ') }}</td>
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
                        <td class="text-center">NIP. {{$dosen->nohp}}</td>
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

    <div class="container ml-5 mr-2" style="margin-top:1000px; padding-top: 50px;">
        <div class="row g-0">
            <div class="col col-md-1 float-left ml-5">
                <img src="{{ asset('sitak/assets/images/unsoed_b&w.png') }}" height="130" width="130">
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
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nama}}  </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> {{$taAll->mahasiswa->nim}}  </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> {{$taAll->mahasiswa->jurusan->namaJurusan}}  </td>
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
                        <td> 15 Februari 2021 s.d 15 Februari 2022 </td>
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
                        <td> {{$taAll->Dosen1->nohp}} </td>
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
                        <td> {{$taAll->Dosen2->nohp}} </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="mt-3">
            <table class="table table-bordered" align="center" border="1px" style="width:95% ">
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

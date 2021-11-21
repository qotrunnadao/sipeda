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

        table tbody td {
            line-height: 1.5;
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
        }

        table thead th {
            line-height: 1.5;
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
        }

        li {
            line-height: 1.5;
            font-size: 18px;
        }

        .baris {
            height: 700px;
        }
    </style>
    <title>Berkas Semhas</title>
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

        <div class="mt-3">
            <table>
                <tbody>
                    <tr>
                        <td> Nomor </td>
                        <td>:</td>
                        <td> <b>442/UN23.12.6.01/PP.05.02/2021</b> </td>
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
                <li>Arief Kelik Nugroho (Dosen Pembimbing 1)</li>
                <li>Eddy maryanto (Dosen Pembimbing 2)</li>
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
                        <td style="text-transform: uppercase"> <b> qotrunnada oktiriani</b> </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul TA </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
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
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Demikian surat undangan seminar hasil tugas akhir , terimakasih atas perhatiannya.</p>
        </div>

        <div class="mr-4 mt-5" style="display: flex; justify-content: right;">
            <table>
                <tbody>
                    <tr>
                        <td>Purbalingga, {{ date('d F Y ') }}</td>
                    </tr>
                    <tr>
                        <td>Ketua Jurusan Informatika</td>
                    </tr>
                    <tr>
                        <td height="100px"></td>
                    </tr>
                    <tr>
                        <td class="text-center"><b><u>Teguh Cahyono</u></b></td>
                    </tr>
                    <tr>
                        <td class="text-center">NIP. 197502012000032005</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 4 untuk dosen penguji, bapendik, ketua komisi]</p>
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


        <p class="text-center mt-4"><b>LAMPIRAN BERITA ACARA SEMINAR HASIL TUGAS AKHIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama :</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> qotrunnada oktiriani </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
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
            <p>Hal yang harus diperhatikan dalam perbaikan tugas akhir : (**)</p>
            <p>.....................................................................................................................................................................................................................................................................................................................................................................</p>
            <p>
                .................................................................................................................................................................................................................................................................................................................................................
            </p>
            <p>............................................................................................................................................................................................................................................................................................................................................................................................................................................................</p>
        </div>

        <div class="mt-3">
            <p>Telah ditetapkan di Purbalingga pada 21 Oktober 2021 pada jam ............ s/d selesai di ruang seminar Fakultas Teknik Purbalingga.</p>
        </div>

        <div class="mt-3">
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        <td width=50%> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        <td width="50%"> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
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


        <p class="text-center mt-4"><b>LAMPIRAN DAFTAR HADIR SEMINAR HASIL TUGAS AKHIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> qotrunnada oktiriani </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
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
            <p>Dengan perincian peserta sebagai berikut</p>
            <table class="table table-bordered">
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

        <div class="mt-3">
            <p>Telah ditetapkan di Purbalingga pada 21 Oktober 2021 pada jam ............ s/d selesai di ruang seminar Fakultas Teknik Purbalingga.</p>
        </div>

        <div class="mt-3">
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        <td width=50%> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        <td width="50%"> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p>Catatan : seminar TA dianggap sah jika peserta/mahasiswa yang hadir minimal 10 orang.</p>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
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


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN SEMINAR HASIL TUGAS AKIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar hasil tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> qotrunnada oktiriani </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
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
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered">
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
                        <td>{{ $no++ }}</td>
                        <td>Sistematika penulisan laporan (0-100)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Tata bahasa penulisan laporan (0-100)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Sistematika penjelasan materi seminar (0-100)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Kecocokan isi laporan dengan materi seminar (0-100)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Materi Tugas Akhir (0-100)</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>Penguasaan terhadat permasalahan tugas akhir</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
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

        <div class="mt-3">
            <p>Keterangan</p>
            <table>
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

        <div class="mt-3">
            <p>Telah ditetapkan di Purbalingga pada 21 Oktober 2021 pada jam ............ s/d selesai di ruang seminar Fakultas Teknik Purbalingga.</p>
        </div>

        <div class="mt-3">
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        <td width=50%> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        <td width="50%"> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
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


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN UJIAN TUGAS AKHIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan ujian tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> qotrunnada oktiriani </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
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
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered">
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
                        <td>{{ $no++ }}</td>
                        <td>Penguasaan materi (cara dan sistematika penyampaian makalah, jawaban pertanyaan)</td>
                        <td></td>
                        <td></td>
                        <td>70%</td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
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

        <div class="mt-3">
            <p>Telah ditetapkan di Purbalingga pada 21 Oktober 2021 pada jam ............ s/d selesai di ruang seminar Fakultas Teknik Purbalingga.</p>
        </div>

        <div class="mt-3">
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        <td width=50%> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        <td width="50%"> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            <p>[Rangkap 3 untuk dosen pembimbing, bapendik, ketua komisi]</p>
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


        <p class="text-center mt-4"><b>LAMPIRAN PENILAIAN TUGAS AKHIR</b>
        </p>

        <div class="mt-3">
            <p>Telah melakukan seminar dan ujian tugas akhir atas nama mahasiswa sebagai berikut,</p>
            <table>
                <tbody>
                    <tr>
                        <td> Nama </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> qotrunnada oktiriani </td>
                    </tr>
                    <tr>
                        <td> NIM </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> H1D018033 </td>
                    </tr>
                    <tr>
                        <td> Jurusan </td>
                        <td>:</td>
                        <td> Teknik Informatika </td>
                    </tr>
                    <tr>
                        <td> Judul Tugas Akhir </td>
                        <td>:</td>
                        <td style="text-transform: uppercase"> Pengembangan Frontend Sistem Pengelolaan Studi Akhir </td>
                    </tr>
                    <tr>
                        <td> Hari/tanggal </td>
                        <td>:</td>
                        <td> Jumat, 12 November 2021 </td>
                    </tr>
                    <tr>
                        <td> Waktu </td>
                        <td>:</td>
                        <td> Jam 09:00 s/d selesai WIB </td>
                    </tr>
                    <tr>
                        <td> Tempat </td>
                        <td>:</td>
                        <td> di ruang seminar Jurusan Teknik FT kampus Purbalingga. </td>
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
            <p>Dengan perincian nilai sebagai berikut</p>
            <table class="table table-bordered">
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
                        <td>{{ $no++ }}</td>
                        <td>Seminar Tugas Akhir</td>
                        <td></td>
                        <td>60%</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>{{ $no++ }}</td>
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

        <div class="mt-3">
            <p>Keterangan</p>
            <table>
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

        <div class="mt-3">
            <p>Telah ditetapkan di Purbalingga pada 21 Oktober 2021 pada jam ............ s/d selesai di ruang seminar Fakultas Teknik Purbalingga.</p>
        </div>

        <div class="mt-3">
            <table class="ml-3">
                <tbody>
                    <tr>
                        <td width="30%"> Pembimbing 1 </td>
                        <td>:</td>
                        <td width=50%> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
                        <td> ttd : .................</td>
                    </tr>
                    <tr>
                        <td width=30%> Pembimbing 2 </td>
                        <td>:</td>
                        <td width="50%"> Teguh Cahyono <br>
                            NIP. 1986307190106 </td>
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

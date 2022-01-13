<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $institusi = [
            [
                'alamat' => "Jl. HR. Boenyamin",
                'email' => 'unsoed@unsoed.ac.id',
                'fax' => '09090',
                'namaInstitusi' => 'Universitas Jenderal Soedirman',
                'website' => 'http://unsoed.ac.id',
            ],
        ];

        DB::table('institusi')->insert($institusi);

        $fakultas = [
            [
                'alamat' => "Jl. MayJend Sunkono",
                'email' => 'ft@unsoed.ac.id',
                'fax' => '09090',
                'namaFakultas' => 'Teknik',
                'website' => 'http://ft.unsoed.ac.id',
                'ins_id' => 1,
            ],
        ];

        DB::table('fakultas')->insert($fakultas);

        $jurusan = [
            [
                'namaJurusan' => "Teknik Elektro",
                'fakultas_id' => 1,
                'kodemk' => 'TKE19'
            ],
            [
                'namaJurusan' => "Teknik Sipil",
                'fakultas_id' => 1,
                'kodemk' => 'UNO101',
            ],
            [
                'namaJurusan' => "Teknik Geologi",
                'fakultas_id' => 1,
                'kodemk' => 'UNO101',
            ],
            [
                'namaJurusan' => "Informatika",
                'fakultas_id' => 1,
                'kodemk' => 'UNO101',
            ],
            [
                'namaJurusan' => "Teknik Industri",
                'fakultas_id' => 1,
                'kodemk' => 'TKI211',
            ],
        ];

        DB::table('jurusan')->insert($jurusan);

        $agama = [
            [
                'namaAgama' => "Islam",
            ],
            [
                'namaAgama' => "Kristen",
            ],
            [
                'namaAgama' => "Protestan",
            ],
            [
                'namaAgama' => "Hindu",
            ],
            [
                'namaAgama' => "Budha",
            ],
            [
                'namaAgama' => "Khong Hu Chu",
            ],
        ];

        DB::table('agama')->insert($agama);

        $jk = [
            [
                'ket' => "LAKI - LAKI",
            ],
            [
                'ket' => "PEREMPUAN",
            ],
        ];

        DB::table('jenkel')->insert($jk);

        $level = [
            [
                'namaLevel' => "komisi",
            ],
            [
                'namaLevel' => "admin",
            ],
            [
                'namaLevel' => "dosen",
            ],
            [
                'namaLevel' => "mahasiswa",
            ],
            [
                'namaLevel' => "ketua jurusan",
            ],
            [
                'namaLevel' => "bapendik",
            ],
            [
                'namaLevel' => "perpus",
            ],
        ];

        DB::table('level')->insert($level);

        $semester = [
            [
                'semester' => "Gasal",
            ],
            [
                'semester' => "Genap",
            ],
        ];

        DB::table('semester')->insert($semester);

        $studiakhir = [
            [
                'tahapan' => "KP",
            ],
            [
                'tahapan' => "TA",
            ],
            [
                'tahapan' => "Pendadaran",
            ],
            [
                'tahapan' => "Yudisium",
            ],
        ];

        DB::table('studi_akhir')->insert($studiakhir);

        $status = [
            [
                'ket' => "Tidak Layak",
            ],
            [
                'ket' => "Review Bapendik",
            ],
            [
                'ket' => "Review Komisi",
            ],
            [
                'ket' => "Pencetakan SPK",
            ],
            [
                'ket' => "Pelaksanaan TA",
            ],
            [
                'ket' => "Pengajuan Seminar Proposal",
            ],
            [
                'ket' => "Pelaksanaan Seminar Proposal",
            ],
            [
                'ket' => "Pengajuan Seminar Hasil",
            ],
            [
                'ket' => "Pelaksanaan Seminar Hasil",
            ],
            [
                'ket' => "Selesai",
            ],
        ];

        DB::table('status')->insert($status);

        $statusnilai = [
            [
                'status' => "Menunggu Berkas Lengkap",
            ],
            [
                'status' => "Upload SIA",
            ],
        ];

        DB::table('statusnilai')->insert($statusnilai);

        $nilaiHuruf = [
            [
                'nilaiHuruf' => 'A',
            ],
            [
                'nilaiHuruf' => 'AB',
            ],
            [
                'nilaiHuruf' => 'B',
            ],
            [
                'nilaiHuruf' => 'BC',
            ],
            [
                'nilaiHuruf' => 'C',
            ],
            [
                'nilaiHuruf' => 'CD',
            ],
            [
                'nilaiHuruf' => 'D',
            ],
            [
                'nilaiHuruf' => 'E',
            ],
        ];

        DB::table('nilai_huruf')->insert($nilaiHuruf);

        $statuspendadaran = [
            [
                'status' => "Tidak Layak",
            ],
            [
                'status' => "Review Bapendik",
            ],
            [
                'status' => "Review Komisi",
            ],
            [
                'status' => "Pencetakan Berita Acara",
            ],
            [
                'status' => "Pelaksanaan Ujian Pendadaran",
            ],
            [
                'status' => "Selesai",
            ],
        ];

        DB::table('statuspendadaran')->insert($statuspendadaran);

        $statusyudisium = [
            [
                'status' => "Tidak Layak",
            ],
            [
                'status' => "Review Bapendik",
            ],
            [
                'status' => "Review Ketua Jurusan",
            ],
            [
                'status' => "Pencetakan Surat Kelulusan",
            ],
            [
                'status' => "Pelaksanaan Yudisium",
            ],
        ];

        DB::table('statusyudisium')->insert($statusyudisium);

        $ruang = [
            [
                'namaRuang' => "SEMINAR 1",
            ],
            [
                'namaRuang' => "SEMINAR 2",
            ],
            [
                'namaRuang' => "SEMINAR 3",
            ],
            [
                'namaRuang' => "SEMINAR 4",
            ],
        ];

        DB::table('ruang')->insert($ruang);

        $ruangPendadaran = [
            [
                'namaRuang' => "Pendadaran 1",
            ],
            [
                'namaRuang' => "Pendadaran 2",
            ],
            [
                'namaRuang' => "Pendadaran 3",
            ],
            [
                'namaRuang' => "Pendadaran 4",
            ],
        ];

        DB::table('ruang_pendadaran')->insert($ruangPendadaran);


        $user = [
            [
                'email' => "qotrunnada.oktiriani@mhs.unsoed.ac.id",
                'noInduk' => "H1D018033",
                'password' => "H1D018033",
                'level_id' => 4,
            ],
            [
                'email' => "himawan.prayoga@mhs.unsoed.ac.id",
                'noInduk' => "H1D018009",
                'password' => "H1D018009",
                'level_id' => 4,
            ],
            [
                'email' => "herfina.yuanita@mhs.unsoed.ac.id",
                'noInduk' => "H1D018026",
                'password' => "H1D018026",
                'level_id' => 4,
            ],
            [
                'email' => "adinda.pangestika@mhs.unsoed.ac.id",
                'noInduk' => "H1D018059",
                'password' => "H1D018059",
                'level_id' => 4,
            ],
            [
                'email' => "atha.narentha@mhs.unsoed.ac.id",
                'noInduk' => "H1D018049",
                'password' => "H1D018049",
                'level_id' => 4,
            ],
            [
                'email' => "nahda.putri@mhs.unsoed.ac.id",
                'noInduk' => "H1D018019",
                'password' => "H1D018019",
                'level_id' => 4,
            ],
            [
                'email' => "Teguh.Cahyono@unsoed.ac.id",
                'noInduk' => "123456",
                'password' => "teguh123",
                'level_id' => 5,
            ],
            [
                'email' => "Lasmedi.Afuan@mhs.unsoed.ac.id",
                'noInduk' => "H1D018199",
                'password' => "dosen123",
                'level_id' => 3,
            ],
            [
                'email' => "ariefkelik.nugroho@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "arief123",
                'level_id' => 1,
            ],
            [
                'email' => "eddy.maryanto@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "eddy123",
                'level_id' => 3,
            ],
            [
                'email' => "bapendik@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "bapendik123",
                'level_id' => 2,
            ],
            [
                'email' => "bangun.wijayanto@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "bangun123",
                'level_id' => 3,
            ],
            [
                'email' => "acep.taryana@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "acep123",
                'level_id' => 3,
            ],
            [
                'email' => "hari.siswantoro@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "hari123",
                'level_id' => 3,
            ],
            [
                'email' => "farida.asriani@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "farida123",
                'level_id' => 5,
            ],
            [
                'email' => "eng.maryoto@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "eng123",
                'level_id' => 5,
            ],
            [
                'email' => "adi.candra@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "adi123",
                'level_id' => 5,
            ],
            [
                'email' => "maria.krisnawati@unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "maria123",
                'level_id' => 5,
            ],
            [
                'email' => "laviesta.narini@mhs.unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "laviesta123",
                'level_id' => 4,
            ],
            [
                'email' => "nada.mitsfir@mhs.unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "nada123",
                'level_id' => 4,
            ],
            [
                'email' => "nahda.putri@mhs.unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "nahda123",
                'level_id' => 4,
            ],
            [
                'email' => "mega.mutiara@mhs.unsoed.ac.id",
                'noInduk' => "1234567",
                'password' => "mega123",
                'level_id' => 4,
            ],

        ];

        DB::table('user')->insert($user);

        // $dosen = [
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Teguh Cahyono",
        //     'nohp' => "082241443663",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 1,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 1,
        //     'jurusan_id' => 4,
        //     'user_id' => 7,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Lasmedi Afuan",
        //     'nohp' => "082241441234",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "198505102008121002",
        //     'jk_id' => 1,
        //     'jurusan_id' => 4,
        //     'user_id' => 8,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Arief Kelik Nugroho",
        //     'nohp' => "087871161840",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 1,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "198512242015041001",
        //     'jk_id' => 1,
        //     'jurusan_id' => 4,
        //     'user_id' => 9,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Eddy Maryanto",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "196711101993031025",
        //     'jk_id' => 1,
        //     'jurusan_id' => 4,
        //     'user_id' => 10,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Bangun Wijayanto",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "198306182006041002",
        //     'jk_id' => 1,
        //     'jurusan_id' => 4,
        //     'user_id' => 12,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Acep Taryana",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 1,
        //     'jurusan_id' => 1,
        //     'user_id' => 13,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Hari Siswantoro",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 0,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 1,
        //     'jurusan_id' => 1,
        //     'user_id' => 14,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Farida Asriani",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 1,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 2,
        //     'jurusan_id' => 1,
        //     'user_id' => 15,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Dr. Eng. Agus Maryoto, S.T., M.T.",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 1,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 1,
        //     'jurusan_id' => 2,
        //     'user_id' => 16,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Adi Candra, S.T., M.T.",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 1,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 1,
        //     'jurusan_id' => 3,
        //     'user_id' => 17,
        // ],
        // [
        //     'alamat' => "Purwokerto",
        //     'nama' => "Maria Krisnawati, S.T., M.T.",
        //     'nohp' => "087871161830",
        //     'tmptLahir' => "Purwokerto",
        //     'isKomisi' => 0,
        //     'isKajur' => 1,
        //     'agama_id' => 1,
        //     'nip' => "197412102008011007",
        //     'jk_id' => 2,
        //     'jurusan_id' => 5,
        //     'user_id' => 18,
        // ],

        // ];

        // DB::table('dosen')->insert($dosen);

        $mahasiswa = [
            [
                'alamat' => "Banyumas",
                'nama' => "Qotrunnada Oktiriani",
                'nim' => "H1D018033",
                'nohp' => "082241443663",
                'tmptLahir' => "Banyumas",
                'agama_id' => 1,
                'jk_id' => 2,
                'jurusan_id' => 4,
                'user_id' => 1,
            ],
            [
                'alamat' => "Cirebon",
                'nama' => "Himawan Zidan Prayoga",
                'nim' => "H1A018009",
                'nohp' => "082241443663",
                'tmptLahir' => "Cirebon",
                'jk_id' => 1,
                'agama_id' => 1,
                'jurusan_id' => 4,
                'user_id' => 2,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Herfina Intan Yuanita",
                'nim' => "H1B018026",
                'nohp' => "082241443663",
                'tmptLahir' => "Purwokerto",
                'jk_id' => 2,
                'agama_id' => 1,
                'jurusan_id' => 2,
                'user_id' => 3,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Atha Narentha O",
                'nim' => "H1D018049",
                'nohp' => "082241443765",
                'tmptLahir' => "Purwokerto",
                'agama_id' => 1,
                'jk_id' => 1,
                'jurusan_id' => 4,
                'user_id' => 5,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Laviesta Narini",
                'nim' => "H1C018011",
                'nohp' => "082241443765",
                'tmptLahir' => "Purwokerto",
                'agama_id' => 1,
                'jk_id' => 2,
                'jurusan_id' => 3,
                'user_id' => 19,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Nada Mitsfir Firdaus",
                'nim' => "H1E018011",
                'nohp' => "082241443765",
                'tmptLahir' => "Purwokerto",
                'agama_id' => 1,
                'jk_id' => 2,
                'jurusan_id' => 5,
                'user_id' => 20,
            ],
            [
                'alamat' => "Pekanbaru",
                'nama' => "Nahda Faadhila Putri",
                'nim' => "H1D018019",
                'nohp' => "082241443765",
                'tmptLahir' => "Bantul",
                'agama_id' => 1,
                'jk_id' => 2,
                'jurusan_id' => 4,
                'user_id' => 21,
            ],
            [
                'alamat' => "Banjarnegara",
                'nama' => "Mega Zulfiya Mutiara",
                'nim' => "H1D018008",
                'nohp' => "082241443765",
                'tmptLahir' => "Banjarnegara",
                'agama_id' => 1,
                'jk_id' => 2,
                'jurusan_id' => 4,
                'user_id' => 22,
            ],
        ];

        DB::table('mahasiswa')->insert($mahasiswa);

        $thnAkad = [
            [
                'aktif' => 1,
                'namaTahun' => "2021/2022",
                'semester_id' => 1,
            ],
        ];

        DB::table('tahunakademik')->insert($thnAkad);

        $Akademik = [
            [
                'mhs_id' => 1,
            ],
            [
                'mhs_id' => 2,
            ],
            [
                'mhs_id' => 3,
            ],
            [
                'mhs_id' => 4,
            ],
            [
                'mhs_id' => 5,
            ],
            [
                'mhs_id' => 6,
            ],
            [
                'mhs_id' => 7,
            ],
            [
                'mhs_id' => 8,
            ],
        ];

        DB::table('akademik')->insert($Akademik);

        // $TA = [
        //     [
        //         'mahasiswa_id' => "1",
        //         'judulTA' => "Sistem Pengelolaan Studi Akhir",
        //         'instansi' => "Fakultasi Teknik Unsoed",
        //         'praproposal' => "proposal-H1D018033",
        //         'pembimbing1_id' => 3,
        //         'pembimbing2_id' => 4,
        //         'status_id' => 2,
        //         'thnAkad_id' => 1,
        //     ],
        //     [
        //         'mahasiswa_id' => "2",
        //         'judulTA' => "Kelistrikan",
        //         'instansi' => "Fakultasi Teknik Unsoed",
        //         'praproposal' => "proposal-H1A018009",
        //         'pembimbing1_id' => 6,
        //         'pembimbing2_id' => 7,
        //         'status_id' => 2,
        //         'thnAkad_id' => 1,
        //     ],
        //     [
        //         'mahasiswa_id' => "3",
        //         'judulTA' => "Analisis Kesipilan",
        //         'instansi' => "Fakultasi Teknik Unsoed",
        //         'praproposal' => "proposal-H1B018026",
        //         'pembimbing1_id' => 9,
        //         'pembimbing2_id' => 9,
        //         'status_id' => 2,
        //         'thnAkad_id' => 1,
        //     ],
        //     [
        //         'mahasiswa_id' => "4",
        //         'judulTA' => "Profile Perusahaan XX berbasis mobile",
        //         'instansi' => "Fakultas Teknik Unsoed",
        //         'praproposal' => "proposal-H1D018049",
        //         'pembimbing1_id' => 2,
        //         'pembimbing2_id' => 5,
        //         'status_id' => 1,
        //         'thnAkad_id' => 1,
        //     ],
        //     [
        //         'mahasiswa_id' => "5",
        //         'judulTA' => "Analisis Batuan Sedimen",
        //         'instansi' => "Fakultas Teknik Unsoed",
        //         'praproposal' => "proposal-H1C018011",
        //         'pembimbing1_id' => 10,
        //         'pembimbing2_id' => 10,
        //         'status_id' => 1,
        //         'thnAkad_id' => 1,
        //     ],
        //     [
        //         'mahasiswa_id' => "6",
        //         'judulTA' => "Tentang Industri",
        //         'instansi' => "Fakultas Teknik Unsoed",
        //         'praproposal' => "proposal-H1E018011",
        //         'pembimbing1_id' => 11,
        //         'pembimbing2_id' => 11,
        //         'status_id' => 1,
        //         'thnAkad_id' => 1,
        //     ],
        // ];

        // DB::table('TA')->insert($TA);

        // $konsultasi = [
        //     [
        //         'hasil' => "perbaikan latar belakang",
        //         'topik' => "BAB 1",
        //         'verifikasiDosen' => 0,
        //         'ta_id' => 1,
        //         'dosen_id' => 1,
        //     ],
        // ];

        // DB::table('konsultasiTA')->insert($konsultasi);

        // $seminar_proposal = [
        //     [
        //         'ta_id' => 1,
        //         'ruang_id' => 1,
        //     ],
        //     [
        //         'ta_id' => 3,
        //         'ruang_id' => 1,
        //     ],
        //     [
        //         'ta_id' => 4,
        //         'ruang_id' => 1,
        //     ],
        // ];

        // DB::table('seminar_proposal')->insert($seminar_proposal);

        // $seminar_hasil = [
        //     [
        //         'ta_id' => 1,
        //         'ruang_id' => 1,
        //     ],
        //     [
        //         'ta_id' => 3,
        //         'ruang_id' => 1,
        //     ],
        //     [
        //         'ta_id' => 4,
        //         'ruang_id' => 1,
        //     ],
        // ];

        // DB::table('seminar_hasil')->insert($seminar_hasil);

        // $nilaiTA = [
        //     [
        //         'ta_id' => 1,
        //         'statusnilai_id' => 1,
        //         'nilaiAngka' => 80.00,
        //         'nilai_huruf_id' => 1,
        //     ],
        // ];

        // DB::table('nilaiTA')->insert($nilaiTA);

        // $SPK = [
        //     [
        //         'ta_id' => 1,
        //         'fileSPK' => "SPK - H1D018033",
        //     ],
        // ];

        // DB::table('SPK')->insert($SPK);

        // $pendadaran = [
        //     [
        //         'mhs_id' => 1,
        //         'berkas' => "berkas - H1D018033",
        //         'beritaacara' => "berita acara",
        //         'no_surat' => "1234566",
        //         'penguji1_id' => 1,
        //         'penguji2_id' => 1,
        //         'penguji3_id' => 1,
        //         'penguji4_id' => 1,
        //         'ruangpendadaran_id' => 1,
        //         'thnAkad_id' => 1,
        //         'statuspendadaran_id' => 1,
        //     ],
        //     [
        //         'mhs_id' => 2,
        //         'berkas' => "berkas - H1D018009",
        //         'beritaacara' => "berita acara",
        //         'no_surat' => "1234566",
        //         'penguji1_id' => 1,
        //         'penguji2_id' => 1,
        //         'penguji3_id' => 1,
        //         'ruangpendadaran_id' => 1,
        //         'penguji4_id' => 1,
        //         'thnAkad_id' => 1,
        //         'statuspendadaran_id' => 2,
        //     ],
        //     [
        //         'mhs_id' => 3,
        //         'berkas' => "berkas - H1D018009",
        //         'beritaacara' => "berita acara",
        //         'no_surat' => "1234566",
        //         'penguji1_id' => 1,
        //         'penguji2_id' => 1,
        //         'ruangpendadaran_id' => 1,
        //         'penguji3_id' => 1,
        //         'penguji4_id' => 1,
        //         'thnAkad_id' => 1,
        //         'statuspendadaran_id' => 3,
        //     ],
        // ];

        // DB::table('pendadaran')->insert($pendadaran);

        // $nilaiPendadaran = [
        //     [
        //         'pendadaran_id' => 1,
        //         'statusnilai_id' => 1,
        //         'nilaiAngka' => 80.00,
        //         'nilai_huruf_id' => 1,
        //     ],
        // ];

        // DB::table('nilai_pendadaran')->insert($nilaiPendadaran);

        // $beritaacara = [
        //     [
        //         'pendadaran_id' => 1,
        //         'beritaacara' => "Berita acara-H1D018033",
        //     ],
        // ];

        // DB::table('beritaacara_pendadaran')->insert($beritaacara);

        // $periode = [
        //     [
        //         'aktif' => 1,
        //         'nosurat' => '1234567889',
        //         'fileSK' => "SK_Periode_2022"
        //     ]
        // ];
        // DB::table('periode_yudisium')->insert($periode);

        // $yudisium = [
        //     [
        //         'mhs_id' => 1,
        //         'berkas' => "berkas - H1D018033",
        //         'thnAkad_id' => 1,
        //         'status_id' => 1,
        //     ],
        //     [
        //         'mhs_id' => 2,
        //         'berkas' => "berkas - H1D018009",
        //         'thnAkad_id' => 1,
        //         'status_id' => 1,
        //     ],
        // ];

        // DB::table('yudisium')->insert($yudisium);
    }
}

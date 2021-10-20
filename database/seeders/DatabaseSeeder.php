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
                'namaLevel' => "mhs",
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
                'ket' => "Disetujui",
            ],
            [
                'ket' => "Tidak Disetujui",
            ],
            [
                'ket' => "Review Bapendik",
            ],
            [
                'ket' => "Review Komisi",
            ],
            [
                'ket' => "Gagal",
            ],
            [
                'ket' => "Boleh Ajukan Lagi",
            ],
        ];

        DB::table('status')->insert($status);

        $statusnilai = [
            [
                'status' => "Entry Dosen",
            ],
            [
                'status' => "Verifikasi Bapendik",
            ],
            [
                'status' => "Upload SIA",
            ],
        ];

        DB::table('statusnilai')->insert($statusnilai);

        $statusta = [
            [
                'status' => "Review Bapendik",
            ],
            [
                'status' => "Review Komisi",
            ],
            [
                'status' => "Layak",
            ],
            [
                'status' => "Tidak Layak",
            ],
            [
                'status' => "Revisi",
            ],
            [
                'status' => "Pelaksanaan TA",
            ],
            [
                'status' => "Selesai",
            ],
        ];

        DB::table('statusta')->insert($statusta);

        $statuspendadaran = [
            [
                'status' => "Review Bapendik",
            ],
            [
                'status' => "Review Komisi",
            ],
            [
                'status' => "Layak",
            ],
            [
                'status' => "Tidak Layak",
            ],
            [
                'status' => "Revisi",
            ],
            [
                'status' => "Pelaksanaan Pendadaran",
            ],
            [
                'status' => "Selesai",
            ],
        ];

        DB::table('statuspendadaran')->insert($statuspendadaran);

        $statusyudisium = [
            [
                'status' => "Review Bapendik",
            ],
            [
                'status' => "Disetujui",
            ],
            [
                'status' => "Tidak Disetujui",
            ],
            [
                'status' => "Boleh Ajukan Lagi",
            ],
            [
                'status' => "Selesai",
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

        $seminar = [
            [
                'jenis' => "seminar KP",
            ],
            [
                'jenis' => "seminar proposal",
            ],
            [
                'jenis' => "seminar hasil TA",
            ],
        ];

        DB::table('jenis_seminar')->insert($seminar);

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
                'level_id' => 1,
            ],
            [
                'email' => "herfina.yuanita@mhs.unsoed.ac.id",
                'noInduk' => "H1D018026",
                'password' => "H1D018026",
                'level_id' => 2,
            ],
            [
                'email' => "adinda.pangestika@mhs.unsoed.ac.id",
                'noInduk' => "H1D018059",
                'password' => "H1D018059",
                'level_id' => 3,
            ],
            [
                'email' => "himawan.prayoga@mhs.unsoed.ac.id",
                'noInduk' => "H1D018009",
                'password' => "H1D018009",
                'level_id' => 4,
            ],
            [
                'email' => "herina.intan@mhs.unsoed.ac.id",
                'noInduk' => "H1D018026",
                'password' => "H1D018026",
                'level_id' => 4,
            ],
            [
                'email' => "atha.narentha@mhs.unsoed.ac.id",
                'noInduk' => "H1D018049",
                'password' => "H1D018049",
                'level_id' => 4,
            ],

        ];

        DB::table('user')->insert($user);

        $dosen = [
            [
                'alamat' => "Purwokerto",
                'nama' => "Teguh Cahyono",
                'nohp' => "082241443663",
                'tmptLahir' => "Purwokerto",
                'isKomisi' => 1,
                'agama_id' => 1,
                'jk_id' => 1,
                'jurusan_id' => 4,
                'user_id' => 1,
            ],
        ];

        DB::table('dosen')->insert($dosen);

        $mahasiswa = [
            [
                'alamat' => "Banyumas",
                'nama' => "Qotrunnada Oktiriani",
                'nim' => "H1D018033",
                'nohp' => "082241443663",
                'tmptLahir' => "Banyumas",
                'agama_id' => 1,
                'jurusan_id' => 4,
                'user_id' => 1,
            ],
            [
                'alamat' => "Cirebon",
                'nama' => "Himawan Zidan Prayoga",
                'nim' => "H1D018009",
                'nohp' => "082241443663",
                'tmptLahir' => "Cirebon",
                'agama_id' => 1,
                'jurusan_id' => 1,
                'user_id' => 5,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Herfina Intan Yuanita",
                'nim' => "H1D018026",
                'nohp' => "082241443663",
                'tmptLahir' => "Purwokerto",
                'agama_id' => 1,
                'jurusan_id' => 2,
                'user_id' => 6,
            ],
            [
                'alamat' => "Purwokerto",
                'nama' => "Atha Narentha O",
                'nim' => "H1A018049",
                'nohp' => "082241443765",
                'tmptLahir' => "Purwokerto",
                'agama_id' => 1,
                'jurusan_id' => 4,
                'user_id' => 7,
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

        $TA = [
            [
                'mahasiswa_id' => "1",
                'judulTA' => "Sistem Pengelolaan Studi Akhir",
                'instansi' => "Fakultasi Teknik Unsoed",
                'praproposal' => "proposal-H1D018033",
                'pembimbing1_id' => 1,
                'pembimbing2_id' => 1,
                'status_id' => 3,
                'thnAkad_id' => 1,
            ],
            [
                'mahasiswa_id' => "2",
                'judulTA' => "Sistem Pengelolaan Studi Akhir",
                'instansi' => "Fakultasi Teknik Unsoed",
                'praproposal' => "proposal-H1D018009",
                'pembimbing1_id' => 1,
                'pembimbing2_id' => 1,
                'status_id' => 1,
                'thnAkad_id' => 1,
            ],
            [
                'mahasiswa_id' => "3",
                'judulTA' => "Sistem Pengelolaan Studi Akhir",
                'instansi' => "Fakultasi Teknik Unsoed",
                'praproposal' => "proposal-H1D018026",
                'pembimbing1_id' => 1,
                'pembimbing2_id' => 1,
                'status_id' => 2,
                'thnAkad_id' => 1,
            ],
            [
                'mahasiswa_id' => "4",
                'judulTA' => "Sistem Pengelolaan Studi Akhir",
                'instansi' => "Fakultas Teknik Unsoed",
                'praproposal' => "proposal-H1D018049",
                'pembimbing1_id' => 1,
                'pembimbing2_id' => 1,
                'status_id' => 1,
                'thnAkad_id' => 1,
            ],
        ];

        DB::table('TA')->insert($TA);

        $konsultasi = [
            [
                'hasil' => "perbaikan latar belakang",
                'topik' => "BAB 1",
                'verifikasiDosen' => 0,
                'ta_id' => 1,
                'dosen_id' => 1,
            ],
        ];

        DB::table('konsultasiTA')->insert($konsultasi);

        $seminar = [
            [
                'ta_id' => 1,
                'jenis_id' => 3,
                'ruang_id' => 1,
            ],
            [
                'ta_id' => 1,
                'jenis_id' => 2,
                'ruang_id' => 1,
            ],
        ];

        DB::table('seminar')->insert($seminar);

        $seminar_proposal = [
            [
                'ta_id' => 1,
                'ruang_id' => 1,
            ],
            [
                'ta_id' => 3,
                'ruang_id' => 1,
            ],
            [
                'ta_id' => 4,
                'ruang_id' => 1,
            ],
        ];

        DB::table('seminar_proposal')->insert($seminar_proposal);

        $seminar_hasil = [
            [
                'ta_id' => 1,
                'ruang_id' => 1,
            ],
            [
                'ta_id' => 3,
                'ruang_id' => 1,
            ],
            [
                'ta_id' => 4,
                'ruang_id' => 1,
            ],
        ];

        DB::table('seminar_hasil')->insert($seminar_hasil);

        $nilaiTA = [
            [
                'ta_id' => 1,
                'statusnilai_id' => 3,
                'nilaiAngka' => 80.00,
                'nilaiHuruf' => "A",
            ],
        ];

        DB::table('nilaiTA')->insert($nilaiTA);

        $SPK = [
            [
                'ta_id' => 1,
                'fileSPK' => "SPK - H1D018033",
            ],
        ];

        DB::table('SPK')->insert($SPK);

        $pendadaran = [
            [
                'mhs_id' => 1,
                'transkip' => "transkip - H1D018033",
                'hasilUEPT' => "uept - H1D018033",
                'buktidistribusi' => "distribusi - H1D018033",
                'beritaacara' => "berita acara",
                'penguji1_id' => 1,
                'penguji2_id' => 1,
                'penguji3_id' => 1,
                'penguji4_id' => 1,
                'thnAkad_id' => 1,
                'statuspendadaran_id' => 1,
            ],
            [
                'mhs_id' => 2,
                'transkip' => "transkip - H1D018009",
                'hasilUEPT' => "uept - H1D018009",
                'buktidistribusi' => "distribusi - H1D018009",
                'beritaacara' => "berita acara",
                'penguji1_id' => 1,
                'penguji2_id' => 1,
                'penguji3_id' => 1,
                'penguji4_id' => 1,
                'thnAkad_id' => 1,
                'statuspendadaran_id' => 2,
            ],
            [
                'mhs_id' => 3,
                'transkip' => "transkip - H1D018009",
                'hasilUEPT' => "uept - H1D018009",
                'buktidistribusi' => "distribusi - H1D018009",
                'beritaacara' => "berita acara",
                'penguji1_id' => 1,
                'penguji2_id' => 1,
                'penguji3_id' => 1,
                'penguji4_id' => 1,
                'thnAkad_id' => 1,
                'statuspendadaran_id' => 3,
            ],
        ];

        DB::table('pendadaran')->insert($pendadaran);

        $nilaiPendadaran = [
            [
                'pendadaran_id' => 1,
                'statusnilai_id' => 3,
                'nilaiAngka' => 80.00,
                'nilaiHuruf' => "A",
            ],
        ];

        DB::table('nilai_pendadaran')->insert($nilaiPendadaran);

        $beritaacara = [
            [
                'pendadaran_id' => 1,
                'beritaacara' => "Berita acara-H1D018033",
            ],
        ];

        DB::table('beritaacara_pendadaran')->insert($beritaacara);

        $yudisium = [
            [
                'mhs_id' => 1,
                'transkip' => "transkip - H1D018033",
                'thnAkad_id' => 1,
                'status_id' => 1,
            ],
            [
                'mhs_id' => 2,
                'transkip' => "transkip - H1D018009",
                'thnAkad_id' => 1,
                'status_id' => 1,
            ],
        ];

        DB::table('yudisium')->insert($yudisium);

        $SK = [
            [
                'yudisium_id' => 1,
                'fileSK' => "SK - H1D018033",
            ],
        ];

        DB::table('SK')->insert($SK);
    }
}

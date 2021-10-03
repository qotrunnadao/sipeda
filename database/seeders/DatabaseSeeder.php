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
        $users = [
            [
                'level' => 'admin',
            ],
            [
                'level' => 'komisi',
            ],
            [
                'level' => 'dosen',
            ],
            [
                'level' => 'mahasiswa',
            ],

        ];

        DB::table('users')->insert($users);

        $jurusan = [
            [
                'nama_jurusan' => 'teknik elektro',
            ],
            [
                'nama_jurusan' => 'teknik sipil',
            ],
            [
                'nama_jurusan' => 'teknik geologi',
            ],
            [
                'nama_jurusan' => 'informatika',
            ],
            [
                'nama_jurusan' => 'teknik industri',
            ],

        ];

        DB::table('jurusan')->insert($jurusan);

        $studi_akhir = [
            [
                'tahapan' => 'tugas akhir',
            ],
            [
                'tahapan' => 'pendadaran',
            ],
            [
                'tahapan' => 'yudisium',
            ],
        ];

        DB::table('studi_akhir')->insert($studi_akhir);
    }
}

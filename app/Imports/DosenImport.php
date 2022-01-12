<?php

namespace App\Imports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;

class DosenImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Dosen([
            'nama' => $row[0],
            'nip' => $row[1],
            'jurusan_id' => $row[2],
            'user_id' => $row[3],
        ]);
    }
}

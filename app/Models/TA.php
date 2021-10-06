<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TA extends Model
{
    use HasFactory;
    protected $table = 'TA';
    protected $fillable = [
        'judulTA',
        'judulTAFinal',
        'keterangan',
        'nama_jabatan',
        'instansi',
        'komisi',
        'nilai',
        'nosurat',
        'praproposal',
        'tglAmbil',
        'tglSPK',
        'tglDaftar',
        'pembimbing1_id',
        'pembimbing2_id',
        'mahasiswa_id',
        'pejabatSK_id',
        'status_id',
        'tahunakademik_id',
    ];
    protected $primaryKey = 'id';

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function Status()
    {
        return $this->belongsTo(Status::class);
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class);
    }
}

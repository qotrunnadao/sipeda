<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemhasTA extends Model
{
    use HasFactory;
    protected $table = 'SemhasTA';
    protected $fillable = [
        'nama_jabatan',
        'beritaAcara',
        'nilai',
        'nilaiHuruf',
        'nosurat',
        'distribusi',
        'statusSIA',
        'tglCetak',
        'tglEntriNilai',
        'tglUploadSIA',
        'jadwal_id',
        'pejabatSK_id',
        'statusDosen_id',
        'statusBapendik_id',
        'TA_id',
    ];
    protected $primaryKey = 'id';

    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function StatusDosen()
    {
        return $this->belongsTo(StatusDosen::class);
    }
    public function PejabatSK()
    {
        return $this->belongsTo(PejabatSK::class);
    }
    public function StatusBapendik()
    {
        return $this->belongsTo(StatusBapendik::class);
    }
    public function TA()
    {
        return $this->belongsTo(TA::class);
    }
}

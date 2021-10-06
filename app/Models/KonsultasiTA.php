<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiTA extends Model
{
    use HasFactory;
    protected $table = 'KonsultasiTA';
    protected $fillable = [
        'hasil',
        'tanggal',
        'topik',
        'verifikasiDosen',
        'dosen_id',
        'mahasiswa_id',
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

}

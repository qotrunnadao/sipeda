<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendadaran extends Model
{
    use HasFactory;
    protected $table = 'pendadaran';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class);
    }

    public function StatusPendadaran()
    {
        return $this->belongsTo(StatusPendadaran::class, 'statuspendadaran_id');
    }
}

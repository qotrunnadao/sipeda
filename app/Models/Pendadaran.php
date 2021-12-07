<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendadaran extends Model
{
    use HasFactory;
    protected $table = 'pendadaran';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function penguji1()
    {
        return $this->belongsTo(Dosen::class, 'penguji1_id');
    }
    public function penguji2()
    {
        return $this->belongsTo(Dosen::class, 'penguji2_id');
    }
    public function penguji3()
    {
        return $this->belongsTo(Dosen::class, 'penguji3_id');
    }
    public function penguji4()
    {
        return $this->belongsTo(Dosen::class, 'penguji4_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'thnAkad_id');
    }
    public function RuangPendadaran()
    {
        return $this->belongsTo(RuangPendadaran::class, 'ruangPendadaran_id');
    }
    public function StatusPendadaran()
    {
        return $this->belongsTo(StatusPendadaran::class, 'statuspendadaran_id');
    }
    public function NilaiPendadaran()
    {
        return $this->hasMany(NilaiPendadaran::class, 'pendadaran_id');
    }

}

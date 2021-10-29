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
        return $this->belongsTo(Tahunakademik::class);
    }

    public function StatusPendadaran()
    {
        return $this->belongsTo(StatusPendadaran::class, 'statuspendadaran_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y H:i:s');
    }

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('d F Y');
    }

    public function getWaktuAttribute()
    {
        return Carbon::parse($this->attributes['waktu'])->translatedFormat('H:i:s');
    }
}

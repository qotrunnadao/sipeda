<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\PeriodeYudisium;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Yudisium extends Model
{
    use HasFactory;
    protected $table = 'yudisium';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'thnAkad_id');
    }
    public function StatusYudisium()
    {
        return $this->belongsTo(StatusYudisium::class, 'status_id');
    }

    public function PeriodeYudisium()
    {
        return $this->belongsTo(PeriodeYudisium::class, 'periode_id');
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

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KP extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'KP';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_id');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function StatusKP()
    {
        return $this->belongsTo(StatusKP::class, 'statuskp_id');
    }
    public function SPK()
    {
        return $this->hasOne(SPK::class, 'kp_id');
    }
    public function KonsultasiKP()
    {
        return $this->hasMany(KonsultasiTA::class, 'kp_id');
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'thnAkad_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y H:i:s');
    }
}

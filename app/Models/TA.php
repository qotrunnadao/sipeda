<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TA extends Model
{
    use HasFactory;
    protected $table = 'TA';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Dosen1()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing1_id');
    }
    public function Dosen2()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing2_id');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function KonsultasiTA()
    {
        return $this->hasMany(KonsultasiTA::class, 'ta_id');
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

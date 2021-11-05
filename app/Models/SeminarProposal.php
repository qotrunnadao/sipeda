<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeminarProposal extends Model
{
    use HasFactory;
    protected $table = 'seminar_proposal';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
    }
    public function Seminar()
    {
        return $this->belongsTo(Seminar::class, 'seminar_id');
    }
    public function SeminarHasil()
    {
        return $this->belongsTo(SeminarHasil::class, 'seminarHasil_id');
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d M Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d M Y H:i:s');
    }

    // public function getTanggalAttribute()
    // {
    //     return Carbon::parse($this->attributes['tanggal'])->translatedFormat('D M Y H:i:s');
    // }

    public function getJamMulaitribute()
    {
        return Carbon::parse($this->attributes['jamMulai'])->translatedFormat('H:i:s');
    }

    public function getJamSelesaitribute()
    {
        return Carbon::parse($this->attributes['jamSelesai'])->translatedFormat('H:i:s');
    }
}

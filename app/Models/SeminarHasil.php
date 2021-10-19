<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeminarHasil extends Model
{
    use HasFactory;
    protected $table = 'seminar_hasil';
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

    public function getJamMulaitribute()
    {
        return Carbon::parse($this->attributes['jamMulai'])->translatedFormat('H:i:s');
    }

    public function getJamSelesaitribute()
    {
        return Carbon::parse($this->attributes['jamSelesai'])->translatedFormat('H:i:s');
    }
}

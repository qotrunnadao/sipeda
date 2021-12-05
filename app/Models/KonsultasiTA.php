<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KonsultasiTA extends Model
{
    use HasFactory;
    protected $table = 'KonsultasiTA';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
    }

    public function getTanggalAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])->translatedFormat('d M Y');
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

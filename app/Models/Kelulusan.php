<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use App\Models\Pendadaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelulusan extends Model
{
    use HasFactory;
    protected $table = 'kelulusan';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function Pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'pendadaran_id');
    }
    public function Yudisium()
    {
        return $this->belongsTo(Yudisium::class, 'yudisium_id');
    }
    public function Akademik()
    {
        return $this->belongsTo(Akademik::class, 'akademik_id');
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

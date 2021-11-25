<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = [
        'id'
    ];
    protected $primaryKey = 'id';

    public function Agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function Jenkel()
    {
        return $this->belongsTo(Jenkel::class);
    }
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function KonsultasiTA()
    {
        return $this->belongsTo(KonsultasiTA::class, 'konsultasiTA_id');
    }
    public function TA()
    {
        return $this->hasMany(TA::class, 'Mahasiswa_id');
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

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class akademik extends Model
{
    use HasFactory;
    protected $table = 'akademik';
    protected $fillable = [
        'ipk',
        'statusKP',
        'statusTA',
        'statusPendadaran',
        'statusYudisium',
        'sks',
        'mhs_id',
        'angkatan',
    ];
    protected $primaryKey = 'id';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function TA()
    {
        return $this->belongsTo(TA::class, 'statusTA');
    }
    public function Pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'statusPendadaran');
    }
    public function Yudisium()
    {
        return $this->belongsTo(Yudisium::class, 'statusYudisium');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function angkatan()
    {
        return $this->belongsTo(Mahasiswa::class, 'angkatan');
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

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Distribusi extends Model
{
    use HasFactory;
    protected $table = 'distribusi_ta';
    protected $fillable = [
        'fileDistribusi',
        'ta_id',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
    }

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa.id');
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

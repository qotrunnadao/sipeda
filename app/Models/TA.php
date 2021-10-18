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

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function Status()
    {
        return $this->belongsTo(Status::class);
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class);
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

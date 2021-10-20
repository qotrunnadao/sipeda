<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SK extends Model
{
    use HasFactory;
    protected $table = 'SK';
    protected $fillable = [
        'fileSK',
        'yudisium_id',
    ];
    protected $primaryKey = 'id';

    public function Yudisium()
    {
        return $this->belongsTo(Yudisium::class, 'yudisium_id');
    }

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
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

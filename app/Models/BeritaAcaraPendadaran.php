<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeritaAcaraPendadaran extends Model
{
    use HasFactory;
    protected $table = 'beritaacara_pendadaran';
    protected $fillable = [
        'beritaacara',
        'pendadaran_id',
    ];
    protected $primaryKey = 'id';

    public function pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'pendadaran_id');
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

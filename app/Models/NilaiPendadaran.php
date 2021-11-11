<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiPendadaran extends Model
{
    use HasFactory;
    protected $table = 'nilai_pendadaran';
    protected $fillable = [
        'nilai_huruf_id',
        'nilaiAngka',
        'statusnilai_id',
        'pendadaran_id',
    ];
    protected $primaryKey = 'id';

    public function Pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'pendadaran_id');
    }
    public function NilaiHuruf()
    {
        return $this->belongsTo(NilaiHuruf::class, 'nilai_huruf_id');
    }
    public function StatusNilai()
    {
        return $this->belongsTo(StatusNilai::class, 'statusnilai_id');
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

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiTA extends Model
{
    use HasFactory;
    protected $table = 'nilaiTA';
    protected $fillable = [
        'nilai_huruf_id',
        'nilaiAngka',
        'pengaju',
        'statusnilai_id',
        'ta_id',
        'ket',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id');
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

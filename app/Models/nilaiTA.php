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
        'nilaiHuruf',
        'nilaiAngka',
        'statusnilai_id',
        'ta_id',
        'filenilaiTA',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
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

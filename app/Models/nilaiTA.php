<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

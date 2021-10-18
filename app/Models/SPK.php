<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $table = 'SPK';
    protected $fillable = [
        'fileSPK',
        'TA_id',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class, 'TA_id');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}

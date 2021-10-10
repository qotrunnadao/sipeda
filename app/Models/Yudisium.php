<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yudisium extends Model
{
    use HasFactory;
    protected $table = 'yudisium';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class);
    }
}

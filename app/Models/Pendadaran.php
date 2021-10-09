<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendadaran extends Model
{
    use HasFactory;
    protected $table = 'pendadaran';
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
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class);
    }
}

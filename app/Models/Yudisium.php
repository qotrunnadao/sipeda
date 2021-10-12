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
        return $this->belongsTo(Mahasiswa::class, 'mhs_id');
    }
    public function Tahunakademik()
    {
        return $this->belongsTo(Tahunakademik::class, 'thnAkad_id');
    }
    public function StatusYudisium()
    {
        return $this->belongsTo(StatusYudisium::class, 'status_id');
    }
}

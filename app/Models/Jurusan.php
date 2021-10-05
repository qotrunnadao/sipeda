<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
        'namaJurusan',
        'fakultas_id',
        'kodemk',
    ];
    protected $primaryKey = 'id';
    public function Fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}

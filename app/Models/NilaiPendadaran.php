<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPendadaran extends Model
{
    use HasFactory;
    protected $table = 'nilai_pendadaran';
    protected $fillable = [
        'nilaiHuruf',
        'nilaiAngka',
        'statusnilai_id',
        'pendadaran_id',
    ];
    protected $primaryKey = 'id';

    public function Pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'pendadaran_id');
    }
    public function StatusNilai()
    {
        return $this->belongsTo(StatusNilai::class, 'statusnilai_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraPendadaran extends Model
{
    use HasFactory;
    protected $table = 'beritaacara_pendadaran';
    protected $fillable = [
        'beritaacara',
        'pendadaran_id',
    ];
    protected $primaryKey = 'id';

    public function pendadaran()
    {
        return $this->belongsTo(Pendadaran::class, 'pendadaran_id');
    }
}

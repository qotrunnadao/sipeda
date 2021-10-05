<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $fillable = [
        'alamat',
        'email',
        'fax',
        'namaFakultas',
        'website',
        'ins_id',
    ];
    protected $primaryKey = 'id';
    public function Institusi()
    {
        return $this->belongsTo(Institusi::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = 'tahunakademik';
    protected $fillable = [
        'aktif',
        'namaTahun',
        'semester_id',
    ];
    protected $primaryKey = 'id';

    public function Semester()
    {
        return $this->belongsTo(Semester::class);
    }
}

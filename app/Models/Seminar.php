<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'Seminar';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function TA()
    {
        return $this->belongsTo(TA::class);
    }
    public function Jenis()
    {
        return $this->belongsTo(JenisSeminar::class);
    }
}

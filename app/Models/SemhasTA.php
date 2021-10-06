<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemhasTA extends Model
{
    use HasFactory;
    protected $table = 'SemhasTA';
    protected $guarded = [

    ];
    protected $primaryKey = 'id';

    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function StatusDosen()
    {
        return $this->belongsTo(StatusDosen::class);
    }
    public function PejabatSK()
    {
        return $this->belongsTo(PejabatSK::class);
    }
    public function StatusBapendik()
    {
        return $this->belongsTo(StatusBapendik::class);
    }
    public function TA()
    {
        return $this->belongsTo(TA::class);
    }
}

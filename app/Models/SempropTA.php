<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SempropTA extends Model
{
    use HasFactory;
    protected $table = 'SempropTA';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function Status()
    {
        return $this->belongsTo(Status::class);
    }
    public function PejabatSK()
    {
        return $this->belongsTo(PejabatSK::class);
    }
    public function TA()
    {
        return $this->belongsTo(TA::class);
    }
    public function statusNilai()
    {
        return $this->belongsTo(StatusNilai::class);
    }
}

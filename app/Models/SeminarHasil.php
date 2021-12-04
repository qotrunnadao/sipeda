<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeminarHasil extends Model
{
    use HasFactory;
    protected $table = 'seminar_hasil';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function TA()
    {
        return $this->belongsTo(TA::class, 'ta_id');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'ta_id');
    }
    public function Seminar()
    {
        return $this->belongsTo(Seminar::class, 'seminar_id');
    }
    public function SeminarProposal()
    {
        return $this->belongsTo(SeminarProposal::class, 'seminarProposal_id');
    }
}

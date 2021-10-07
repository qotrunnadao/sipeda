<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
    use HasFactory;
    protected $table = 'nilaiTA';
    protected $fillable = [
        'fileSPK',
        'TA_id',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class);
    }
}

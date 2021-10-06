<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akademik extends Model
{
    use HasFactory;
    protected $table = 'akademik';
    protected $fillable = [
        'ipk',
        'isKP',
        'isTA',
        'isPendadaran',
        'isYudisium',
        'sks',
        'mhs_id',
    ];
    protected $primaryKey = 'id';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

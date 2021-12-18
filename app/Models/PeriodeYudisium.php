<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeYudisium extends Model
{
    use HasFactory;
    protected $table = 'periode_yudisium';
    protected $guarded = [
        'id',
    ];
    protected $primaryKey = 'id';
}

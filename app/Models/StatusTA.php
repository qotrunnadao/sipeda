<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTA extends Model
{
    use HasFactory;
    protected $table = 'statusta';
    protected $fillable = [
        'status',
    ];
    protected $primaryKey = 'id';
}

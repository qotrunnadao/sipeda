<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKP extends Model
{
    use HasFactory;
    protected $table = 'statuskp';
    protected $fillable = [
        'status',
    ];
    protected $primaryKey = 'id';
}

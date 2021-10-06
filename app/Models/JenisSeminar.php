<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSeminar extends Model
{
    use HasFactory;
    protected $table = 'jenis_seminar';
    protected $fillable = [
        'jenis'
    ];
    protected $primaryKey = 'id';
}

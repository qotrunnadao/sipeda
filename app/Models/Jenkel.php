<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenkel extends Model
{
    use HasFactory;
    protected $table = 'jenkel';
    protected $fillable = [
        'ket',
    ];
    protected $primaryKey = 'id';
}

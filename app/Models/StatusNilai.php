<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusNilai extends Model
{
    use HasFactory;
    protected $table = 'statusnilai';
    protected $fillable = [
        'status',
    ];
    protected $primaryKey = 'id';
}

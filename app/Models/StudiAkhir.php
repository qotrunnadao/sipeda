<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudiAkhir extends Model
{
    use HasFactory;

    protected $table = 'studi_akhir';
    protected $fillable = [
        'tahapan',
    ];

    protected $primaryKey = 'id';
}

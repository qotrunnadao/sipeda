<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    use HasFactory;
    protected $table = 'institusi';
    protected $fillable = [
        'alamat',
        'email',
        'fax',
        'namaInstitusi',
        'website',
    ];
    protected $primaryKey = 'id';
}

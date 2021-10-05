<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPendadaran extends Model
{
    use HasFactory;
    protected $table = 'statuspendadaran';
    protected $fillable = [
        'status',
    ];
    protected $primaryKey = 'id';
}

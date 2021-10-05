<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'email',
        'noInduk',
        'password',
        'level_id',
    ];
    protected $primaryKey = 'id';

    public function Level()
    {
        return $this->belongsTo(Level::class);
    }
}

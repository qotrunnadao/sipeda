<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    protected $fillable = [
        'nama',
        'nip',
        'user_id',
        'email',
        'password',
        'foto',
    ];

    protected $primaryKey = 'id';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

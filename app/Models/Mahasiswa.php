<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama',
        'nim',
        'user_id',
        'id_jurusan',
        'email',
        'password',
        'ip',
        'ipk',
        'jumlah_sks',
        'foto',
    ];

    protected $primaryKey = 'id';

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}

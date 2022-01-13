<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'alamat',
        'foto',
        'nama',
        'nohp',
        'tglLahir',
        'tmptLahir',
        'isKomisi',
        'isKajur',
        'agama_id',
        'jk_id',
        'jurusan_id',
        'user_id',
        'nip'
    ];
    protected $primaryKey = 'id';

    public function Agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }
    public function Jenkel()
    {
        return $this->belongsTo(Jenkel::class, 'jk_id');
    }
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function TA1()
    {
        return $this->hasMany(TA::class, 'pembimbing1_id');
    }
    public function TA2()
    {
        return $this->hasMany(TA::class, 'pembimbing2_id');
    }
}

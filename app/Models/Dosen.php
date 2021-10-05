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
        'agama_id',
        'jk_id',
        'jurusan_id',
        'user_id',
    ];
    protected $primaryKey = 'id';

    public function Agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function Jenkel()
    {
        return $this->belongsTo(Jenkel::class);
    }
    public function Jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

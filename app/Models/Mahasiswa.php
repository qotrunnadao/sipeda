<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'alamat',
        'foto',
        'nama',
        'nohp',
        'tglLahir',
        'tmptLahir',
        'agama_id',
        'jk_id',
        'jurusan_id',
        'user_id',
        'pembimbing1_id',
        'pembimbing2_id',
        'penguji1_id',
        'penguji2_id',
        'penguji3_id',
        'penguji4_id',
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
    public function Dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}

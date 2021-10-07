<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = [
        'id'
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

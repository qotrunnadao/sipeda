<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    use HasFactory;
    protected $table = 'SK';
    protected $fillable = [
        'fileSK',
        'yudisium_id',
    ];
    protected $primaryKey = 'id';

    public function Yudisium()
    {
        return $this->belongsTo(Yudisium::class);
    }
}

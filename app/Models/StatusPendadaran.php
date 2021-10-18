<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusPendadaran extends Model
{
    use HasFactory;
    protected $table = 'statuspendadaran';
    protected $fillable = [
        'status',
    ];
    protected $primaryKey = 'id';

    public function StatusPendadaran()
    {
        return $this->belongsTo(StatusPendadaran::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y H:i:s');
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SPK extends Model
{
    use HasFactory;
    protected $table = 'SPK';
    protected $fillable = [
        'fileSPK',
        'TA_id',
    ];
    protected $primaryKey = 'id';

    public function TA()
    {
        return $this->belongsTo(TA::class, 'TA_id');
    }
    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa.id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y H:i:s');
    }
	public static function Berkas($pdf, $filename){
        Storage::put('public/assets/file/SPK TA/' . $filename, $pdf->output());
        dd($filename);
    }

}

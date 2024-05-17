<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;
use App\Models\Spp;
use App\Models\Rencana;

class DetailSpp extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'id_spp',
        'id_rencana',
        'harga',
        'jumlah',
        'keterangan',
    ];

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function rencana()
    {
        return $this->belongsTo(Rencana::class, 'id_rencana');
    }
}

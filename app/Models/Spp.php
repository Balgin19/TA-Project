<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailSpp;


class Spp extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_spp';
    protected $table ='spp';
    protected $fillable = [
        'no_spp',
        'id_bagian',
        'kepentingan',
        'hari',
        'tanggal',
        'approve_kepala',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function details()
    {
        return $this->hasMany(DetailSpp::class, 'id_spp');
    }
}

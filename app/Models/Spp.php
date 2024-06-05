<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailSpp;

class Spp extends Model
{
    // Atur nama tabel dan atribut yang dapat diisi secara massal
    protected $table = 'spp';
    protected $fillable = ['nomor_spp', 'bagian', 'tanggal', 'kepentingan'];

    // Definisikan relasi antara model Spp dan DetailSpp
    public function detailSpp()
    {
        return $this->hasMany(DetailSpp::class, 'id_spp');
    }
}

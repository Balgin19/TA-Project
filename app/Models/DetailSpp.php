<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSpp extends Model
{
    use HasFactory;

    // Atur nama tabel dan non-incrementing primary key
    protected $table = 'detail_spp';
    protected $primaryKey = ['id_spp', 'id']; // Perbarui jika diperlukan
    protected $fillable = ['id_spp', 'uraian_kegiatan', 'harga', 'jumlah', 'keterangan'];
    public $incrementing = false;

    // Definisikan relasi antara model DetailSpp dan Spp
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'uraian_kegiatan', 'id_proker');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;

    // Atur nama tabel dan primary key
    protected $table = 'rencana';
    protected $primaryKey = 'id_rencana';
    protected $fillable = ['id_proker', 'bagian', 'volume', 'jenis', 'jumlah', 'harga_satuan'];

    // Definisikan relasi dengan model Proker
    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker');
    }
}

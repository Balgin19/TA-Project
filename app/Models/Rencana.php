<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rencana extends Model
{
    use HasFactory;
    
    

    // Atur nama tabel di sini
    protected $primaryKey = 'id_rencana';
    protected $table = 'rencana';
    protected $fillable = ['id_proker', 'id_bagian', 'volume', 'jenis', 'jumlah', 'harga_satuan'];



    // Definisikan relasi dengan model Proker
    public function proker()
    {
        return $this->belongsTo(Proker::class, 'id_proker');
    }
}


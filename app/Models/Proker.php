<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    // Atur nama tabel di sini
    protected $primaryKey = 'id_proker';
    protected $table = 'proker';
    protected $fillable = ['uraian', 'level', 'parent'];

    // Definisikan relasi dengan model Rencana
    public function rencana()
    {
        return $this->hasMany(Rencana::class, 'id_proker');
    }
}

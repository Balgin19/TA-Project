<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\DetailSpp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function spp()
    {
        // Mengambil semua data SPP dari tabel
        $spp = Spp::all();
        
        // Mengambil detail pembayaran yang terkait dengan setiap entitas SPP
        $details = [];
        foreach ($spp as $item) {
            $detail = DetailSpp::where('id_spp', $item->id_spp)
                ->leftJoin('rencana', 'detail_spp.id_rencana', '=', 'rencana.id_rencana')
                ->select('detail_spp.*', 'rencana.*')
                ->get();
            $details[$item->id_spp] = $detail;
        }
    
        // Mengirim data ke view
        return view('spp.index', compact('spp', 'details'));
    }
    
    

    
}

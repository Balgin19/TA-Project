<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Spp;
use App\Models\DetailSpp;
use App\Models\Proker;
use Carbon\Carbon;

class SppController extends Controller
{
    public function spp()
    {
        $spp = Spp::with('detailSpp')->get();
        return view('spp.index', compact('spp'));
    }

    public function show($id)
    {
        $spp = Spp::with('detailSpp.proker')->findOrFail($id);
        return view('spp.show', compact('spp'));
    }

    public function tambahSpp()
    {
        // Ambil data rencana dengan harga dan jumlah
        $rencanas = DB::table('rencana')
            ->join('proker', 'rencana.id_proker', '=', 'proker.id_proker')
            ->select('rencana.id_rencana', 'proker.id_proker', 'proker.uraian', 'rencana.harga_satuan', 'rencana.jumlah')
            ->get();

        return view('spp.create', compact('rencanas'));
    }

    public function getHargaJumlah(Request $request)
    {
        // Dapatkan nilai yang dipilih dari permintaan
        $selectedValue = $request->input('selected_value');

        // Ambil data terkait dari tabel "rencana" berdasarkan nilai yang dipilih
        $dataRencana = DB::table('rencana')
            ->where('id_proker', $selectedValue) // Sesuaikan dengan nama kolom yang benar
            ->first();

        // Jika data ditemukan, kembalikan harga dan jumlah
        if ($dataRencana) {
            return response()->json([
                'harga' => $dataRencana->harga_satuan,
                'jumlah' => $dataRencana->jumlah
            ]);
        }

        // Jika data tidak ditemukan, kembalikan respons kosong
        return response()->json([]);
    }

    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_spp' => 'required|string|max:50|unique:spp',
            'bagian' => 'required|string|max:100',
            'kepentingan' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'detail_spp' => 'required|array',
            'detail_spp.*.uraian_kegiatan' => 'required|string',
            'detail_spp.*.harga' => 'required|numeric',
            'detail_spp.*.jumlah' => 'required|integer',
            'detail_spp.*.biaya' => 'required|numeric',
            'detail_spp.*.keterangan' => 'nullable|string',
        ]);

        // Membuat SPP
        $spp = Spp::create([
            'nomor_spp' => $request->nomor_spp,
            'bagian' => $request->bagian,
            'kepentingan' => $request->kepentingan,
            'tanggal' => $request->tanggal,
        ]);

        // Menambahkan Detail SPP
        foreach ($request->detail_spp as $detail) {
            DetailSpp::create([
                'id_spp' => $spp->id,
                'uraian_kegiatan' => $detail['uraian_kegiatan'], // Menggunakan id_proker sebagai foreign key
                'harga' => $detail['harga'],
                'jumlah' => $detail['jumlah'],
                'biaya' => $detail['biaya'],
                'keterangan' => $detail['keterangan'] ?? '',
            ]);
        }

        return redirect()->route('spp')->with('success', 'SPP berhasil dibuat.');
    }

    public function approve($id)
    {
        // Temukan SPP berdasarkan ID
        $spp = Spp::findOrFail($id);
        
        // Lakukan proses approve di sini (misalnya mengubah status approve)
        $spp->approve_kepala = true;
        $spp->save();
    
    return redirect()->back()->with('success', 'Permintaan pembayaran berhasil disetujui.');
    }


    public function delete($id)
    {
        // Temukan SPP berdasarkan ID
        $spp = Spp::findOrFail($id);

        // Hapus SPP beserta semua detail SPP yang terkait
        $spp->delete();

        return redirect()->route('spp')->with('success', 'SPP berhasil dihapus.');
    }

}

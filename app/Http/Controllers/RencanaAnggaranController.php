<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rencana;
use App\Models\Proker;

class RencanaAnggaranController extends Controller
{
    public function rencaran(Request $request)
    {
        if ($request->has('cari')) {
            $rencanaProker = Rencana::whereHas('proker', function ($query) use ($request) {
                $query->where('uraian', 'LIKE', '%' . $request->cari . '%');
            })->get();
        } else {
            $rencanaProker = Rencana::with('proker')->get();
        }

        // Ambil data uraian proker untuk dropdown dengan filter level 3
        $uraianProkers = Proker::whereNotIn('id_proker', Rencana::pluck('id_proker')->all())
                               ->where('level', 3)
                               ->pluck('uraian', 'id_proker');

        // Kirim data rencanaProker dan uraianProkers ke view
        return view('rencana-anggaran.index', compact('rencanaProker', 'uraianProkers'));   
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'id_proker' => 'required|exists:proker,id_proker',
            'bagian' => 'required',
            'volume' => 'required|integer',
            'jenis' => 'required|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        // Simpan data ke dalam tabel Rencana
        Rencana::create([
            'id_proker' => $validatedData['id_proker'],
            'bagian' => $validatedData['bagian'],
            'volume' => $validatedData['volume'],
            'jenis' => $validatedData['jenis'],
            'jumlah' => $validatedData['jumlah'],
            'harga_satuan' => $validatedData['harga_satuan'],
        ]);

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('rencaran')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Dapatkan data rencana berdasarkan ID
        $rencanaProker = Rencana::with('proker')->findOrFail($id);

        // Kirim data rencana ke view untuk diedit
        return view('rencana-anggaran.edit', compact('rencanaProker'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'bagian' => 'required|string',
            'volume' => 'required|integer',
            'jenis' => 'required|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        try {
            // Temukan data rencana berdasarkan ID
            $rencanaProker = Rencana::findOrFail($id);

            // Perbarui data rencana dengan data yang diverifikasi dari request
            $rencanaProker->update($validatedData);

            // Redirect dengan pesan sukses
            return redirect('rencaran')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangani dengan baik dan kirimkan pesan kesalahan
            return redirect('rencaran')->with('error', 'Gagal memperbarui data. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        // Temukan data rencana berdasarkan ID
        $rencanaProker = Rencana::findOrFail($id);
        
        // Hapus data rencana
        $rencanaProker->delete();

        // Redirect dengan pesan sukses
        return redirect('rencaran')->with('success', 'Data berhasil dihapus.');
    }
}

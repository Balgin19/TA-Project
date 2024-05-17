<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;

class ProgramController extends Controller
{

    public function program(Request $request)
    {
        if($request->has('cari')){
        
        $program = \App\Models\Proker::where('uraian','LIKE','%'.$request->cari.'%')->get();
        }else{
            
            $program = Proker::all();
       
        }

        // Mengirim data proker ke view untuk ditampilkan
        return view('program.index', compact('program'));
    }

    public function create(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'uraian' => 'required|string',
        ]);

        // Simpan data ke dalam tabel Proker dengan level 3 dan parent 2
        Proker::create([
            'uraian' => $validatedData['uraian'],
            'level' => 3,
            'parent' => 2,
        ]);

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect('program')->with('success', 'Program berhasil ditambahkan.');
    }

    public function delete($id)
    {
        // Temukan program berdasarkan ID
        $program = Proker::findOrFail($id);

        // Hapus program
        $program->delete();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect('program')->with('success', 'Program berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        // Temukan program berdasarkan ID
        $program = Proker::findOrFail($id);

        // Validasi data yang diterima dari permintaan
        $validatedData = $request->validate([
            'uraian' => 'required|string',
            // tambahkan validasi untuk data lain yang ingin Anda perbarui
        ]);

        // Perbarui atribut program dengan data yang diterima
        $program->uraian = $validatedData['uraian'];
        // perbarui atribut lain yang diperlukan

        // Simpan perubahan
        $program->save();

        // Redirect ke halaman yang sesuai
        return redirect()->route('program')->with('success', 'Program berhasil diperbarui');
    }
}

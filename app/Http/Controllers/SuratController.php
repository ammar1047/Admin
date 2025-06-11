<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Surat;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::all();
        return view('surat.index', compact('surats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_surat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $filePath = $request->file('file_surat')->store('surat', 'public');

        Surat::create([
            'judul_surat' => $request->judul_surat,
            'kategori' => $request->kategori,
            'file_surat' => $filePath
        ]);

        return redirect()->back()->with('success', 'Surat berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $request->validate([
            'judul_surat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        // Cek apakah file baru diunggah
        if ($request->hasFile('file_surat')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($surat->file_surat)) {
                Storage::disk('public')->delete($surat->file_surat);
            }

            // Simpan file baru
            $filePath = $request->file('file_surat')->store('surat', 'public');
            $surat->file_surat = $filePath;
        }

        $surat->judul_surat = $request->judul_surat;
        $surat->kategori = $request->kategori;
        $surat->save();

        return redirect()->back()->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        if (Storage::disk('public')->exists($surat->file_surat)) {
            Storage::disk('public')->delete($surat->file_surat);
        }

        $surat->delete();

        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditSuratController extends Controller
{
    public function index()
    {
        // Data dummy hanya untuk tampilan
        $templates = [
            (object)[
                'id' => 1,
                'judul_template' => 'Surat Undangan',
                'format_file' => 'pdf',
                'kategori' => (object)['nama_kategori' => 'Undangan'],
            ],
            (object)[
                'id' => 2,
                'judul_template' => 'Surat Keterangan',
                'format_file' => 'docx',
                'kategori' => (object)['nama_kategori' => 'Keterangan'],
            ]
        ];

        return view('admin.editsurat.index', compact('templates'));
    }

    public function edit($id)
    {
        // Data dummy untuk tampilan edit
        $template = (object)[
            'id' => $id,
            'judul_template' => 'Contoh Judul Template',
            'format_file' => 'pdf',
            'kategori_id' => 1
        ];

        $kategoriList = [
            (object)['id' => 1, 'nama_kategori' => 'Undangan'],
            (object)['id' => 2, 'nama_kategori' => 'Keterangan'],
        ];

        return view('admin.editsurat.edit', compact('template', 'kategoriList'));
    }
}

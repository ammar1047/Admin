<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika tabel kamu namanya bukan 'surats')
    protected $table = 'surats';

    // Kolom yang boleh diisi massal (mass assignable)
    protected $fillable = [
        'judul_surat',     // nama atau judul surat
        'kategori',        // kategori surat
        'file_surat'       // path file yang disimpan
    ];
}

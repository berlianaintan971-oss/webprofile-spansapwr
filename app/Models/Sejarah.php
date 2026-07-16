<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database secara eksplisit (opsional tapi aman)
    protected $table = 'sejarahs';

    // Mendaftarkan kolom yang boleh diisi massal saat proses updateOrCreate
    protected $fillable = [
        'konten',
        'foto',
    ];
}
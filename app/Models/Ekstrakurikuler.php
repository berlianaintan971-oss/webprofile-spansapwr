<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'ekstrakurikulers';

    // Field yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'pembina',
        'jadwal',
        'deskripsi',
        'foto',
    ];
}
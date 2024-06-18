<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;

    protected $table = 'penginapan';

    protected $primaryKey = 'id_penginapan';

    protected $fillable = [
        'nama_penginapan',
        'deskripsi_penginapan',
        'alamat_penginapan',
        'gambar_penginapan',
        'harga_penginapan',
    ];
}


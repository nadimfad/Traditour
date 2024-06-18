<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    protected $table = 'kuliner';
    protected $primaryKey = "id_kuliner";
    protected $fillable = ['judul', 'gambar', 'artikel'];

    public function ragamBudayas()
    {
        return $this->hasMany(RagamBudaya::class, 'id_kuliner');
    }
}

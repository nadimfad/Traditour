<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KerajinanKreatif extends Model
{
    protected $table = 'kerajinan_kreatif';

    protected $primaryKey = 'id_kerajinan_kreatif';
    protected $fillable = ['judul', 'gambar', 'artikel'];

    public function ragamBudayas()
    {
        return $this->hasMany(RagamBudaya::class, 'id_kerajinan_kreatif');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonBahari extends Model
{
    protected $table = 'non_bahari';

    protected $primaryKey = 'id_non_bahari';
    protected $fillable = ['judul', 'gambar', 'artikel'];

    public function ragamBudayas()
    {
        return $this->hasMany(RagamBudaya::class, 'id_non_bahari');
    }
}


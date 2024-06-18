<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahari extends Model
{
    protected $table = 'bahari';
    protected $primaryKey = 'id_bahari'; 
    protected $fillable = ['judul', 'gambar', 'artikel'];

    public function ragamBudayas()
    {
        return $this->hasMany(RagamBudaya::class, 'id_bahari');
    }
}

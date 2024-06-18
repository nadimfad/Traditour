<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeniBudaya extends Model
{
    protected $table = 'seni_budaya';
    protected $primaryKey = 'id_seni_budaya';
    protected $fillable = ['judul', 'gambar', 'artikel'];

    public function ragamBudayas()
    {
        return $this->hasMany(RagamBudaya::class, 'id_seni_budaya');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RagamBudaya extends Model
{
    protected $table = 'ragam_budaya';

    protected $fillable = ['nama_budaya', 'id_bahari', 'id_non_bahari', 'id_seni_budaya', 'id_kuliner', 'id_kerajinan_kreatif'];

    public function bahari()
    {
        return $this->belongsTo(Bahari::class, 'id_bahari');
    }

    public function nonBahari()
    {
        return $this->belongsTo(NonBahari::class, 'id_non_bahari');
    }

    public function seniBudaya()
    {
        return $this->belongsTo(SeniBudaya::class, 'id_seni_budaya');
    }

    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class, 'id_kuliner');
    }

    public function kerajinanKreatif()
    {
        return $this->belongsTo(KerajinanKreatif::class, 'id_kerajinan_kreatif');
    }
}

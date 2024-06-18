<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bahari;
use App\Models\NonBahari;
use App\Models\SeniBudaya;
use App\Models\Kuliner;
use App\Models\KerajinanKreatif;
use App\Models\Gallery;
use App\Models\Penginapan;

class DashboardController extends Controller
{
    public function total()
    {
        $counts = [
            'bahari_count' => Bahari::count(),
            'nonbahari_count' => NonBahari::count(),
            'senibudaya_count' => SeniBudaya::count(),
            'kuliner_count' => Kuliner::count(),
            'kerajinankreatif_count' => KerajinanKreatif::count(),
            'gallery_count' => Gallery::count(),
            'penginapan_count' => Penginapan::count(),
        ];

        return view('admin.landingpage', compact('counts'));
    }
}

use Illuminate\Http\Request;

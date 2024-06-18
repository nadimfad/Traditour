<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $visitorCount = Visitor::count();
        $bahariCount = DB::table('bahari')->count();
        $nonBahariCount = DB::table('non_bahari')->count();
        $seniBudayaCount = DB::table('seni_budaya')->count();
        $kulinerCount = DB::table('kuliner')->count();
        $kerajinanKreatifCount = DB::table('kerajinan_kreatif')->count();
        $penginapanCount = DB::table('penginapan')->count();
        $galleryCount = DB::table('gallery')->count();
        $forumsCount = DB::table('forums')->count();
        $usersCount = DB::table('users')->where('role', 'user')->count();
        $commentsCount = DB::table('comments')->count();
        $likesCount = DB::table('likes')->count();

        return view('admin.landingpage', compact(
            'visitorCount', 'bahariCount', 'nonBahariCount', 'seniBudayaCount',
            'kulinerCount', 'kerajinanKreatifCount', 'penginapanCount', 
            'galleryCount', 'forumsCount', 'usersCount', 'commentsCount'
            ,'likesCount'));
    }
}

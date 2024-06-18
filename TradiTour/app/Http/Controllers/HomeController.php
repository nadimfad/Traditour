<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use App\Models\Bahari;
use App\Models\NonBahari;
use App\Models\SeniBudaya;
use App\Models\Kuliner;
use App\Models\KerajinanKreatif;
use App\Models\Gallery;
use App\Models\Penginapan;

class HomeController extends Controller
{
    public function index()
    {
        return view('tampilan.landingpage');
    }

    public function about()
    {
        return view('about.index');
    }

    public function kontak()
    {
        return view('kontak.index');
    }

    public function sendEmail(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to('TradiTour@outlook.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('message', 'Email sent successfully!');
    }

    public function galeri()
    {
        $galeris = Gallery::all();
        return view('galeri.index', compact('galeris'));
    }



    // Ragam budaya show function

    public function bahari(Request $request)
    {
        $recentbahariarticles = Bahari::latest()->take(6)->get();
        $query = $request->input('search');
        $baharis = Bahari::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('artikel', 'LIKE', "%{$query}%");
        })->paginate(20);

        return view('RagamBudaya.bahari', compact('baharis', 'query','recentbahariarticles'));
    }

    public function showbahari($id)
    {
        $bahari = Bahari::findOrFail($id);
        return view('artikel.bahari', compact('bahari'));
    }

    public function nonbahari(Request $request)
    {
        
        $query = $request->input('search');
        $nonBaharis = Nonbahari::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('artikel', 'LIKE', "%{$query}%");
        })->paginate(20); 

        return view('RagamBudaya.nonbahari', compact('nonBaharis', 'query'));
    }
    public function shownonbahari($id)
    {
        $nonBahari = Nonbahari::findOrFail($id);
        return view('artikel.nonbahari', compact('nonBahari'));
    }

    public function kuliner(Request $request)
    {
        
        $query = $request->input('search');
        $kuliners = Kuliner::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('artikel', 'LIKE', "%{$query}%");
        })->paginate(20); 

        return view('RagamBudaya.kuliner', compact('kuliners', 'query'));
    }

    public function showkuliner($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        return view('artikel.kuliner', compact('kuliner'));
    }

    public function senibudaya(Request $request)
    {
        
        $query = $request->input('search');
        $senibudayas = Senibudaya::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('artikel', 'LIKE', "%{$query}%");
        })->paginate(20); 

        return view('RagamBudaya.senibudaya', compact('senibudayas', 'query'));
    }

    public function showsenibudaya($id)
    {
        $senibudaya = Senibudaya::findOrFail($id);
        return view('artikel.senibudaya', compact('senibudaya'));
    }

    public function kerajinan(Request $request)
    {
        
        $query = $request->input('search');
        $kerajinans = KerajinanKreatif::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('artikel', 'LIKE', "%{$query}%");
        })->paginate(20); 

        return view('RagamBudaya.kerajinan', compact('kerajinans', 'query'));
    }


    public function showkerajinan($id)
    {
        $kerajinan = KerajinanKreatif::findOrFail($id);
        return view('artikel.kerajinankreatif', compact('kerajinan'));
    }

    public function penginapan(Request $request)
    {
        $query = $request->input('search');

        $penginapansQuery = Penginapan::query();

        if ($query) {
            $penginapansQuery->where('nama_penginapan', 'LIKE', "%{$query}%")
                            ->orWhere('alamat_penginapan', 'LIKE', "%{$query}%");
        }

        $penginapans = $penginapansQuery->get();

        return view('penginapan.index', compact('penginapans','query'));
    }

    public function showpenginapan($id)
    {
        $penginapan = Penginapan::findOrFail($id);
        return view('penginapan.show', compact('penginapan'));
    }
}

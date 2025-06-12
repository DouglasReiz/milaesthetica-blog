<?php

namespace App\Http\Controllers;

use App\Models\SiteVisit;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $visit = SiteVisit::first();
        $total = $visit ? $visit->count : 0;

        $visitsPerDay = SiteVisit::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->take(30) // mostra os últimos 30 dias
            ->get();


        return view('dashboard', compact('total', 'visitsPerDay'));
    }
}

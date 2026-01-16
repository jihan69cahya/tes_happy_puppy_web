<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['kategori'] = Produk::selectRaw("
            SUM(CASE WHEN kategori = 'Kategori A' THEN 1 ELSE 0 END) as a,
            SUM(CASE WHEN kategori = 'Kategori B' THEN 1 ELSE 0 END) as b,
            SUM(CASE WHEN kategori = 'Kategori C' THEN 1 ELSE 0 END) as c
        ")->first()->toArray();

        $data['produk_stok'] = Produk::orderBy('stok', 'desc')
            ->limit(5)
            ->get();
        $data['produk_harga'] = Produk::orderBy('harga', 'desc')
            ->limit(5)
            ->get();
        $data['breadcrumbs'] = [['title' => 'Dashboard', 'url' => null]];
        return view('pages.dashboard', compact('data'));
    }
}

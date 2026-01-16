<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['breadcrumbs'] = [['title' => 'Dashboard', 'url' => null]];
        return view('pages.dashboard', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        if (auth()->user()->level != 'Administrator') {
            abort(404);
        }
        return view('levelAdmin.dashboard');
    }

    public function karyawanDashboard(): View
    {
        if (auth()->user()->level != 'Karyawan') {
            abort(404);
        }
        return view('levelKaryawan.dashboard');
    }

    public function supervisiDashboard(): View
    {
        if (auth()->user()->level != 'Supervisi') {
            abort(404);
        }
        return view('levelSupervisi.dashboard');
    }

    public function memberDashboard(): View
    {
        if (auth()->user()->level != 'Member') {
            abort(404);
        }
        return view('levelMember.dashboard');
    }
}

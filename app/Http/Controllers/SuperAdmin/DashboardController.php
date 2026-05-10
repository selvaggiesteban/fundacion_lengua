<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal del SuperAdmin.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Devuelve la vista que se encuentra en:
        // resources/views/superadmin/dashboard.blade.php
        return view('superadmin.dashboard');
    }
}
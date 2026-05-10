<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal del Estudiante.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Devuelve la vista que se encuentra en:
        // resources/views/student/dashboard.blade.php
        return view('student.dashboard');
    }
}
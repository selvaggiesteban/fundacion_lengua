<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Accomodation;
use App\Models\Order;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Muestra el panel principal del Administrador.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Métricas esenciales del sistema
        $totalStudents = Student::count();
        $activeStudents = Student::where('status', 'active')->count();
        $totalAccommodations = Accomodation::count();
        $accommodationsWithStudents = Accomodation::has('students')->count();
        $totalScholarships = Scholarship::count();
        $totalRevenue = Order::sum('total_amount') ?? 0;
        $monthlyRevenue = Order::whereMonth('created_at', date('m'))
                              ->whereYear('created_at', date('Y'))
                              ->sum('total_amount') ?? 0;
        
        return view('admin.dashboard', compact(
            'totalStudents',
            'activeStudents',
            'totalAccommodations',
            'accommodationsWithStudents',
            'totalScholarships',
            'totalRevenue',
            'monthlyRevenue'
        ));
    }
}
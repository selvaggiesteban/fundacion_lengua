<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Accomodation;
use App\Models\Order;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Analytics extends Controller
{
  public function index()
  {
    // Métricas reales del sistema
    $totalStudents = Student::count();
    $activeStudents = Student::where('status', 'active')->count();
    $totalAccommodations = Accomodation::count();
    $accommodationsWithStudents = Accomodation::has('students')->count();
    $totalScholarships = Scholarship::count();
    $totalRevenue = Order::sum('total_amount') ?? 0;

    // Estudiantes por país (top 5)
    $studentsByCountry = Student::select('country', DB::raw('count(*) as count'))
                              ->whereNotNull('country')
                              ->groupBy('country')
                              ->orderBy('count', 'desc')
                              ->limit(5)
                              ->get();

    return view('content.dashboard.dashboards', compact(
      'totalStudents',
      'activeStudents',
      'totalAccommodations',
      'accommodationsWithStudents',
      'totalScholarships',
      'totalRevenue',
      'studentsByCountry'
    ));
  }
}

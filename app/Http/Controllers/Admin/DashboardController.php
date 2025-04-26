<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = DB::table('doctors')->count();
        $totalPatients = DB::table('patients')->count();
        $totalAppointments = DB::table('appointments')->count();

          // ✅ Fetch latest 5 patients
          $recentPatients = DB::table('patients')
          ->orderBy('created_at', 'desc')
          ->limit(5)
          ->get();

      // ✅ Fetch latest 5 appointments (joining doctor and patient names)
      $recentAppointments = DB::table('appointments')
          ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
          ->join('patients', 'appointments.patient_id', '=', 'patients.id')
          ->select('appointments.*', 'doctors.name as doctor_name', 'patients.name as patient_name')
          ->orderBy('appointments.created_at', 'desc')
          ->limit(5)
          ->get();

        return view('dashboards.admin', [
            'totalDoctors' => $totalDoctors,
            'totalPatients' => $totalPatients,
            'totalAppointments' => $totalAppointments,
            'recentPatients' => $recentPatients,          // ✅ MUST be passed like this
            'recentAppointments' => $recentAppointments,  // ✅ and this
        ]);
    }
}

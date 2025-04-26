<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = DB::table('appointments')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->select('appointments.*', 'doctors.name as doctor_name', 'patients.name as patient_name')
            ->orderBy('appointments.appointment_date')
            ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = DB::table('doctors')->get();
        $patients = DB::table('patients')->get();
    
        return view('admin.appointments.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
    
        DB::table('appointments')->insert([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('admin.manage_appointments.index')->with('success', 'Appointment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment = DB::table('appointments')->where('id', $id)->first();
        $doctors = DB::table('doctors')->get();
        $patients = DB::table('patients')->get();

    return view('admin.appointments.edit', compact('appointment', 'doctors', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);
    
        DB::table('appointments')->where('id', $id)->update([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => $request->status,
            'updated_at' => now(),
        ]);
    
        return redirect()->route('admin.manage_appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('appointments')->where('id', $id)->delete();
    return redirect()->route('admin.manage_appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = DB::table('patients')->get();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:patients',
            'contact_number' => 'required|string',
        ]);

        DB::table('patients')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.manage_patients.index')->with('success', 'Patient added successfully.');
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
        $patient = DB::table('patients')->where('id', $id)->first();
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:patients,email,' . $id,
            'contact_number' => 'required|string',
        ]);

        DB::table('patients')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.manage_patients.index')->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('patients')->where('id', $id)->delete();
        return redirect()->route('admin.manage_patients.index')->with('success', 'Patient deleted successfully.');
    }
}

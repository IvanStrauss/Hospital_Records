<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = DB::table('doctors')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'specialization' => 'nullable|string',
        ]);

        DB::table('doctors')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
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
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors,email,'.$id,
            'specialization' => 'nullable|string',
        ]);

        DB::table('doctors')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'specialization' => $request->specialization,
            'updated_at' => now(),
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}

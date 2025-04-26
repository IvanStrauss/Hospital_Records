@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('dashboard_active', 'active')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Admin Dashboard</h2>

  <div class="row">
    <!-- Total Doctors -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-primary">
        <div class="card-body text-center">
          <h3>{{ $totalDoctors }}</h3>
          <p class="card-text">Total Doctors</p>
        </div>
      </div>
    </div>

    <!-- Total Patients -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-success">
        <div class="card-body text-center">
          <h3>{{ $totalPatients }}</h3>
          <p class="card-text">Total Patients</p>
        </div>
      </div>
    </div>

    <!-- Total Appointments -->
    <div class="col-md-4 mb-4">
      <div class="card text-white bg-warning">
        <div class="card-body text-center">
          <h3>{{ $totalAppointments }}</h3>
          <p class="card-text">Total Appointments</p>
        </div>
      </div>
    </div>
  </div>

  <!---->
  <div class="row mt-5">
    <!-- Recent Patients -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Recent Patients</h5>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Name</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($recentPatients as $index => $patient)
                      <tr>
                        {{-- <td>{{ $index + 1 }}</td> --}}
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->contact_number }}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="3" class="text-center">No patients found.</td>
                      </tr>
                      @endforelse
                      </tbody>
                      
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Appointments -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Recent Appointments</h5>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0 table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($recentAppointments as $index => $appointment)
                      <tr>
                        
                        <td>{{ $appointment->doctor_name }}</td>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="4" class="text-center">No appointments found.</td>
                      </tr>
                      @endforelse
                      </tbody>
                      
                </table>
            </div>
        </div>
    </div>
</div>



</div>
@endsection

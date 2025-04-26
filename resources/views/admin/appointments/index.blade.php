@extends('layouts.app')

@section('title', 'Manage Appointments')

@section('appointments_active', 'active')

@section('content')
<div class="container py-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Manage Appointments</h2>
    <a href="{{ route('admin.manage_appointments.create') }}" class="btn btn-primary">
      <i class="bi bi-calendar-plus"></i> Add New Appointment
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>Doctor</th>
        <th>Patient</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($appointments as $appointment)
      <tr>
        <td>{{ $appointment->doctor_name }}</td>
        <td>{{ $appointment->patient_name }}</td>
        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
        <td>
          <span class="badge
            @if($appointment->status == 'pending') bg-warning
            @elseif($appointment->status == 'confirmed') bg-success
            @elseif($appointment->status == 'cancelled') bg-danger
            @else bg-secondary
            @endif
          ">
            {{ ucfirst($appointment->status) }}
          </span>
        </td>
        <td class="d-flex justify-content-center gap-2">
          <div class="flex-fill">
            <a href="{{ route('admin.manage_appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning w-100">
              <i class="bi bi-pencil"></i> Edit
            </a>
          </div>
          <div class="flex-fill">
            <form action="{{ route('admin.manage_appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Are you sure you want to delete this appointment?')">
                <i class="bi bi-trash"></i> Delete
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection


@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('appointments_active', 'active')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit Appointment</h2>
    <a href="{{ route('admin.manage_appointments.index') }}" class="btn btn-secondary">
      <i class="bi bi-arrow-left"></i> Back
    </a>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Oops!</strong> Please fix the following errors:
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.manage_appointments.update', $appointment->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="doctor_id" class="form-label">Select Doctor</label>
      <select name="doctor_id" id="doctor_id" class="form-select" required>
        @foreach ($doctors as $doctor)
          <option value="{{ $doctor->id }}" {{ (old('doctor_id', $appointment->doctor_id) == $doctor->id) ? 'selected' : '' }}>
            {{ $doctor->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="patient_id" class="form-label">Select Patient</label>
      <select name="patient_id" id="patient_id" class="form-select" required>
        @foreach ($patients as $patient)
          <option value="{{ $patient->id }}" {{ (old('patient_id', $appointment->patient_id) == $patient->id) ? 'selected' : '' }}>
            {{ $patient->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="appointment_date" class="form-label">Appointment Date</label>
      <input type="date" name="appointment_date" id="appointment_date" class="form-control"
        value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
    </div>

    <div class="mb-3">
      <label for="appointment_time" class="form-label">Appointment Time</label>
      <input type="time" name="appointment_time" id="appointment_time" class="form-control"
        value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select name="status" id="status" class="form-select" required>
        <option value="pending" {{ old('status', $appointment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="confirmed" {{ old('status', $appointment->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
        <option value="cancelled" {{ old('status', $appointment->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="bi bi-save"></i> Update Appointment
    </button>
  </form>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Manage Patients')

@section('patients_active', 'active')

@section('content')
<div class="container py-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Manage Patients</h2>
    <a href="{{ route('admin.manage_patients.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Add New Patient
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($patients as $patient)
      <tr>
        <td>{{ $patient->name }}</td>
        <td>{{ $patient->email }}</td>
        <td>{{ $patient->contact_number }}</td>
        <td class="d-flex justify-content-center gap-2">
          <div class="flex-fill">
            <a href="{{ route('admin.manage_patients.edit', $patient->id) }}" class="btn btn-sm btn-warning w-100">
              <i class="bi bi-pencil"></i> Edit
            </a>
          </div>
          <div class="flex-fill">
            <form action="{{ route('admin.manage_patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Are you sure you want to delete this patient?')">
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


@extends('layouts.app')

@section('title', 'Add New Patient')

@section('patients_active', 'active')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Add New Patient</h2>
    <a href="{{ route('admin.manage_patients.index') }}" class="btn btn-secondary">
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

  <form method="POST" action="{{ route('admin.manage_patients.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter patient name" required value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Enter patient email" required value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label for="contact_number" class="form-label">Contact Number</label>
      <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Enter patient contact number" required value="{{ old('contact_number') }}">
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Add Patient
    </button>
  </form>
</div>
@endsection


@extends('layouts.app')

@section('title', 'Add New User')

@section('user_active', 'active')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Add New User</h2>
    <a href="{{ route('admin.user_management.index') }}" class="btn btn-secondary">
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

  <form method="POST" action="{{ route('admin.user_management.store') }}">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Select Role</label>
      <select name="role" id="role" class="form-select" required>
        <option value="">-- Choose Role --</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="bi bi-person-plus"></i> Add User
    </button>
  </form>
</div>
@endsection


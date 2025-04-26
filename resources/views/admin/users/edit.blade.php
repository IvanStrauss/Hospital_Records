@extends('layouts.app')

@section('title', 'Edit User')

@section('user_active', 'active')

@section('content')
<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Edit User</h2>
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

  <form method="POST" action="{{ route('admin.user_management.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" name="name" id="name" class="form-control"
        value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input type="email" name="email" id="email" class="form-control"
        value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Select Role</label>
      <select name="role" id="role" class="form-select" required>
        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="doctor" {{ old('role', $user->role) == 'doctor' ? 'selected' : '' }}>Doctor</option>
        <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">
      <i class="bi bi-save"></i> Update User
    </button>
  </form>

</div>
@endsection


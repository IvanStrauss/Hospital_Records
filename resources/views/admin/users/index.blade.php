@extends('layouts.app')

@section('title', 'User Management')

@section('user_active', 'active')

@section('content')
<div class="container py-4">
  
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">User Management</h2>
    <a href="{{ route('admin.user_management.create') }}" class="btn btn-primary">
      <i class="bi bi-person-plus"></i> Add New User
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
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ isset($user->role) ? ucfirst($user->role) : 'No Role' }}</td>
        <td class="d-flex justify-content-center gap-2">
          <div class="flex-fill">
            <a href="{{ route('admin.user_management.edit', $user->id) }}" class="btn btn-sm btn-warning w-100">
              <i class="bi bi-pencil"></i> Edit
            </a>
          </div>
          <div class="flex-fill">
            <form action="{{ route('admin.user_management.destroy', $user->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Are you sure you want to delete this user?')">
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


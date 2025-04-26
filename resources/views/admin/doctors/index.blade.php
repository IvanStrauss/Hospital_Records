@extends('layouts.app')

@section('title', 'Manage Doctors')

@section('doctors_active', 'active') <!-- ✅ THIS ONE ADDED -->

@section('content')
<div class="container py-4">
  

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Manage Doctors</h2>
    <a href="{{ route('admin.manage_doctors.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Add New Doctor
    </a>
  </div>



  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        {{-- <th>#</th> --}}
        <th>Name</th>
        <th>Email</th>
        <th>Specialization</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($doctors as $index => $doctor)
          <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->specialization }}</td>
            <td class="d-flex justify-content-center gap-2">
                <div class="flex-fill">
                  <a href="{{ route('admin.manage_doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning w-100">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                </div>
              
                <div class="flex-fill">
                  <form action="{{ route('admin.manage_doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Are you sure you want to delete this doctor?')">
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

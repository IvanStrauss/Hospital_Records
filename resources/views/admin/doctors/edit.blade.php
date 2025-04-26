@extends('layouts.app')

@section('title', 'Edit Doctor')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Edit Doctor</h2>

  <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ $doctor->email }}" required>
    </div>

    <div class="mb-3">
      <label>Specialization</label>
      <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection

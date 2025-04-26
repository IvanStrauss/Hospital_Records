@extends('layouts.app')

@section('title', 'Add New Doctor')

@section('content')
<div class="container py-4">
  <h2 class="mb-4">Add New Doctor</h2>

  <form method="POST" action="{{ route('doctors.store') }}">
    @csrf

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Specialization</label>
      <input type="text" name="specialization" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection

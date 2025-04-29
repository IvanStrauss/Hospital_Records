@extends('layouts.doctor') <!-- if you have a separate doctor layout -->

@section('title', 'Doctor Dashboard')

@section('content')
<div class="container py-4">
    <h2>Welcome, Dr. {{ auth()->user()->name }}!</h2>
    <p>This is your Doctor Dashboard.</p>
</div>
@endsection

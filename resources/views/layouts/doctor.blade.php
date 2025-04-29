<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #dde9ea;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 300px;
      background-color: #0a66c2;
      color: white;
      height: 100%;
      position: fixed;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 30px;
      box-shadow: 3px 0 5px rgba(0,0,0,0.1);
    }
    .sidebar img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }
    .sidebar h5 {
      margin-bottom: 30px;
    }
    .nav-link {
      color: white;
      width: 100%;
      text-align: left;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }
    .nav-link:hover, .nav-link.active {
      background-color: #e1ecf7;
      color: #0a66c2;
      border-radius: 20px;
    }
    .logout {
      margin-top: auto;
      margin-bottom: 20px;
    }
    .main-content {
      margin-left: 300px;
      padding: 20px;
    }
  </style>
</head>

<body>

  <div class="sidebar d-flex flex-column">
    <img src="{{ asset('img/profile.png') }}" alt="Profile">
    <h5>{{ auth()->user()->name }}</h5>

    <nav class="nav flex-column w-75">
      <a class="nav-link @yield('dashboard_active')" href="{{ route('doctor.dashboard') }}">
        <i class="bi bi-grid"></i> Dashboard
      </a>

      <a class="nav-link @yield('appointments_active')" href="{{ route('doctor.my_appointments') }}">
        <i class="bi bi-calendar-check"></i> My Appointments
      </a>

      <a class="nav-link @yield('patients_active')" href="{{ route('doctor.patient_records') }}">
        <i class="bi bi-folder2-open"></i> Patient Records
      </a>

      <a class="nav-link @yield('confirm_appointments_active')" href="{{ route('doctor.confirm_appointments') }}">
        <i class="bi bi-calendar2-check"></i> Confirm Appointments
      </a>
    </nav>

    <div class="w-75 mt-auto mb-3 px-3">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link nav-link d-flex align-items-center w-100 text-center ps-20">
          <i class="bi bi-power"></i> 
          <span>Logout</span>
        </button>
      </form>
    </div>
  </div>

  <div class="main-content">
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

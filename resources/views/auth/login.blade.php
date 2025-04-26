<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Hospital Records</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #e0ebec;
    }

    .sidebar {
      width: 300px;
      background-color: #0a66c2;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .sidebar img {
      width: 190px;
      border-radius: 50%;
      margin-bottom: 20px;
      padding: 10px;
    }

    .form-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <img src="{{ asset('img/logo.png') }}" alt="Hospital Logo">
    <h2>Hospital Records</h2>
  </div>

  <div class="form-container">
    <div class="login-box">
      <h2 class="text-center text-primary mb-4">Login</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        @if($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" id="email" class="form-control" required autofocus>
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</body>
</html>


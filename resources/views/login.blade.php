<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-container {
      display: flex;
      height: 100vh;
    }
    .left-circle {
      width: 45%;
      background: linear-gradient(to right, #0288d1 0%, #03a9f4 100%);
      border-top-right-radius: 50%;
      border-bottom-right-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .right-content {
      width: 55%;
      padding: 100px;
    }
    .login-title {
      font-size: 48px;
      margin-bottom: 30px;
      font-weight: 300;
    }
    .form-control {
      margin-bottom: 20px;
    }
    .btn-login {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="left-circle"></div>
    <div class="right-content">
      <h2 class="login-title">LOGIN</h2>
      <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn btn-login">LOGIN</button>
      </form>
    </div>
  </div>
</body>
</html>

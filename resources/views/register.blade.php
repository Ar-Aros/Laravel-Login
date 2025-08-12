<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      background: #f0f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #333;
    }
    .register-container {
      background: white;
      padding: 2.5rem 3rem;
      border-radius: 8px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
    }
    h2 {
      margin-bottom: 1.5rem;
      font-weight: 700;
      color: #2c3e50;
    }
    form input {
      width: 100%;
      padding: 0.8rem 1rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    form input:focus {
      border-color: #3498db;
      outline: none;
      box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }
    button {
      width: 100%;
      padding: 0.9rem;
      background-color: #3498db;
      border: none;
      border-radius: 5px;
      color: white;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #2980b9;
    }
    .login-link {
      margin-top: 1rem;
      display: block;
      color: #3498db;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    .login-link:hover {
      color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="/register">
      @csrf
      <input type="text" name="name" placeholder="Name" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Register</button>
    </form>
    <a href="/login" class="login-link">Already have an account? Login</a>
  </div>
</body>
</html>

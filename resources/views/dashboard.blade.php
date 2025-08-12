<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f7fc;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: #fff;
      padding: 2rem 3rem;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      width: 320px;
    }
    h2 {
      margin-bottom: 0.5rem;
      font-weight: 600;
    }
    .time {
      margin: 1rem 0 2rem;
      font-size: 1.1rem;
      color: #555;
    }
    a.logout-btn {
      display: inline-block;
      background-color: #e74c3c;
      color: white;
      text-decoration: none;
      padding: 0.6rem 1.2rem;
      border-radius: 4px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }
    a.logout-btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>
  <main class="container">
    <h2>Welcome, {{ $user->name }}</h2>
    <div class="time" id="currentTime">Loading current time...</div>
    <a href="/logout" class="logout-btn">Logout</a>
  </main>

  <script>
    function updateTime() {
      const now = new Date();
      const options = { 
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
        hour: '2-digit', minute: '2-digit', second: '2-digit',
        hour12: false 
      };
      document.getElementById('currentTime').textContent = now.toLocaleString('en-US', options);
    }
    updateTime();
    setInterval(updateTime, 1000);
  </script>
</body>
</html>

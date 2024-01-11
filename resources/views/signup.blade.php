<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .login-btn {
      background-color: #3498db;
    }

    .login-btn:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <form action="/register" method="post">
    @csrf
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname" required>

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>

    <button type="submit">Sign Up</button>
    <button type="button" class="login-btn" onclick="window.location.href='/login'">Login</button>
  </form>
</body>
</html>

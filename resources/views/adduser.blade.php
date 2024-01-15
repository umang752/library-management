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

    input,
    select {
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

    .error-message {
      color: red;
      font-size: smaller;
    }
    .required {
      color: red;
      margin-left: 3px;
    }
  </style>
</head>

<body>
  <form action="/adduser" method="post" autocomplete="off">
    @csrf
    <div>
      <label for="fname">First Name<span class="required">*</span></label>
      <input type="text" id="fname" name="fname" required value="{{ old('fname') }}">
      <div class="error-message" class="alert alert-danger">
        @error('fname')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div>
      <label for="lname">Last Name<span class="required">*</span></label>
      <input type="text" id="lname" name="lname" required value="{{ old('lname') }}">
      <div class="error-message" class="alert alert-danger">
        @error('lname')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div>
      <label for="email">Email<span class="required">*</span></label>
      <input type="email" id="email" name="email" required value="{{ old('email') }}">
      <div class="error-message" class="alert alert-danger">
        @error('email')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div>
      <label for="password">Password<span class="required">*</span></label>
      <input type="password" id="password" name="password" required value="{{ old('password') }}">
      <div class="error-message" class="alert alert-danger">
        @error('password')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div>
      <label for="confirm_password">Confirm Password<span class="required">*</span></label>
      <input type="password" id="confirm_password" name="confirm_password" required value="{{ old('confirm_password') }}">
      <div class="error-message" class="alert alert-danger">
        @error('confirm_password')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div>
      <label for="phone">Phone<span class="required">*</span></label>
      <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}">
      <div class="error-message" class="alert alert-danger">
        @error('phone')
        <span>{{ $message }}</span>
        @enderror
      </div>
    </div>

    <label for="status">Status</label>
    <select id="status" name="status" required value="{{ old('status') }}">
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>

    <label for="role">Role</label>
    <select id="role" name="role" required value="{{ old('role') }}">
      <option>Admin</option>
      <option>Student</option>
    </select>

    <button type="submit">Add User</button>
    <button id="deleteButton" type="button" onclick="window.location.href='/manage-user'" style="float: right;">Cancel</button>

  </form>
</body>

</html>
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

    
    .error-message{
      color:red;
      font-size: smaller;
    }
    .required {
      color: red;
      margin-left: 3px;
    }
  </style>
</head>
<body>
  <form action="/edituser/{{$data['user_id']}}" method="post"  autocomplete="off">
    @csrf
    <div>
    <label for="fname">First Name<span class="required">*</span></label>
    <input type="text" id="fname" name="fname" required value="{{$data['first_name']}}">
    <div class="error-message" class="alert alert-danger">
    @error('fname')
            <span>{{ $message }}</span>
        @enderror
  </div>
  </div>
  <div>
    <label for="lname">Last Name<span class="required">*</span></label>
    <input type="text" id="lname" name="lname" required value="{{$data['last_name']}}">
    <div class="error-message" class="alert alert-danger">
    @error('lname')
            <span>{{ $message }}</span>
        @enderror
  </div>
  </div>
  <div>
    <label for="email">Email<span class="required">*</span></label>
    <input type="email" id="email" name="email" required value="{{$data['email']}}">
    <div class="error-message" class="alert alert-danger">
    @error('email')
            <span>{{ $message }}</span>
        @enderror
  </div>
  </div>
  
  <div>
    <label for="phone">Phone<span class="required">*</span></label>
    <input type="tel" id="phone" name="phone" required value="{{$data['phone_number']}}">
    <div class="error-message" class="alert alert-danger">
    @error('phone')
            <span>{{ $message }}</span>
        @enderror
  </div>
  </div>
  
    <label for="status">Status<span class="required">*</span></label>
    <select id="status" name="status" required value="{{$data['status']}}">
      <option value="active">Active</option>
      <option value="inactive">Inactive</option>
    </select>

    <label for="role">Role<span class="required">*</span></label>
    <select id="role" name="role" required value="{{$data['role']}}">
      <option >Admin</option>
      <option >Student</option>
    </select>

    <button type="submit">Edit User</button>
    <button id="deleteButton" type="button" onclick="window.location.href='/manage-user'" style="float: right;">Cancel</button>

    </form>
</body>
</html>

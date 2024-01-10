<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <!-- <pre>
        @php
        print_r($errors->all());
        @endphp
    </pre> -->
<form action="{{ url('/') }}/login" method="post">
  @csrf
  
  <!-- @php
  $demo =5;
  @endphp -->
  <x-Heading headingName="Login Page" />
  <div class="container">
    <!-- <x-Input type="text" name="Name" /> -->
    <x-Input type="email" name="Email" />
    <x-Input type="password" name="Password" />
    <button type="submit" class="btn btn-primary">Submit</button>
    <x-Links linkUrl="/register" label="Sign Up" />
    <x-Links linkUrl="/forgotPassword" label="Forgot Passsword?" />
  </div>
</form>
</body>
</html>
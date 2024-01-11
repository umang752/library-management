<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Sign Up Page
      </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


<body>
<form action="{{ url('/') }}/register" method="post">
  @csrf
  <x-Heading headingName="Sign Up Page" />
  <div class="container">
    <x-Input type="text" name="First_Name"  />
    <x-Input type="text" name="Last_Name"  />
    <x-Input type="email" name="Email"  />
    <x-Input type="password" name="Password" />
    <x-Input type="password" name="Confirm Password" />
    <x-Input type="text" name="Phone_Number"  />
    <button type="submit" class="btn btn-primary">Submit</button>
    <x-Links linkUrl="/login" label="Login" />
  </div>
</form>
</body>
</html>
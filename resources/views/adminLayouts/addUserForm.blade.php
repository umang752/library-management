<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <script>
        // Redirect to the URL in a new tab using JavaScript
        window.open('{{ url()->current() }}', '_blank');
    </script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Add User
      </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


<!-- Your regular content here -->

<body>
<form action="/manage-users/updateUserHandler" method="post">
  @csrf   
  <x-Heading headingName="Add User" />
  <div class="container">
    <x-Input type="text" name="First_Name"  />
    <x-Input type="text" name="Last_Name"  />
    <x-Input type="email" name="Email"  />
    <x-Input type="password" name="Password"  />
    <!-- <x-Input type="password" name="Confirm_Password" value="" /> -->
    <x-Input type="text" name="Phone_Number"  />
    
    <button type="submit" class="btn btn-primary">ADD</button>
    <!-- <x-Links linkUrl="/login" label="Login" /> -->
  </div>
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      {{$title}}
      </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


<!-- Your regular content here -->

<body>
    <!-- <pre>
        @php
        print_r($errors->all());
        @endphp
    </pre> -->
<form action="{{ url('/') }}/register" method="post">
  @csrf
  
  <!-- @php
  $demo =5;
  @endphp -->
    $lname1 ="";
    $email1 ="";
    $fname1 ="";
    $phone1 ="";
    $status1="";
  @if(isset($user)){
    $fname1 =$user->fname ;
    $lname1 =$user->lname;
    $email1 =$user->email ;
    $phone1 =$user->phone ;
    $status1=$user->status ;
  }
  @endif
  <x-Heading headingName="{{$title}}" />
  <div class="container">
    <x-Input type="text" name="First_Name" value="{{$fname1}}" />
    <x-Input type="text" name="Last_Name" value="{{$lname1}}" />
    <x-Input type="email" name="Email" value="{{$email1}}" />
    <x-Input type="password" name="Password" value="" />
    <x-Input type="password" name="Confirm_Password" value="" />
    <x-Input type="text" name="Phone_Number" value="{{$phone1}}" />
    <button type="submit" class="btn btn-primary">Submit</button>
    <x-Links linkUrl="/login" label="Login" />
  </div>
</form>
</body>
<!-- @if($title !== 'Sign Up Page')
    <script>
        // Redirect to the URL in a new tab using JavaScript
        window.open('{{ url()->current() }}', '_blank');
    </script>
@endif -->
</html>